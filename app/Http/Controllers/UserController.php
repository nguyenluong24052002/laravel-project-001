<?php

namespace App\Http\Controllers;

use App\Http\Requests\SaveUserRequest;
use App\Models\Family;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    protected $familyModel;

    protected $userModel;

    protected $profileModel;

    public function __construct(Family $family, User $user, Profile $profile)
    {
        $this->familyModel = $family;
        $this->userModel = $user;
        $this->profileModel = $profile;
    }

    public function index(Request $request)
    {
        $query = $this->userModel->query();
        $families = $this->familyModel->all();

        if (! empty($request->family_id)) {
            $query->where('family_id', $request->family_id);
        }

        if (! empty($request->keyword)) {
            $keyword = '%'.$request->keyword.'%';
            $query->where(function ($query) use ($keyword) {
                $query->orWhere('name', 'like', $keyword)
                    ->orWhere('email', 'like', $keyword)
                    ->orWhere('phone', 'like', $keyword);
            });
        }

        $users = $query->paginate(5);

        return view('users.index', compact('users', 'families'));
    }

    public function create()
    {
        $families = $this->familyModel->all(); // Lấy danh sách gia đình từ model Family

        return view('users.form', compact('families'));
    }

    public function store(SaveUserRequest $request)
    {
        $inputs = $request->all();
        $inputs['password'] = bcrypt($request->password);

        // Xử lý trường avatar
        if ($request->hasFile('avatar')) {
            $avatarPath = $request->file('avatar')->store('avatars', 'public');
            $inputs['avatar'] = $avatarPath;
        }

        // Lưu trường family_name vào bảng families và gán family_id cho người dùng
        if ($request->has('family_name')) {
            $family = $this->familyModel->create(['name' => $request->family_name]);
            $family_id = $family->id; // Lấy id của gia đình mới được tạo
            $inputs['family_id'] = $family_id;
        }

        $user = $this->userModel->create($inputs);

        // Kiểm tra xem có nhập thông tin profile hay không
        if ($request->filled('facebook_url') || $request->filled('twitter_url') || $request->filled('youtube_url') || $request->filled('zalo_phone') || $request->filled('other_info')) {
            // Nếu có nhập thông tin profile, tạo mới profile và liên kết với user
            $profileData = [
                'facebook_url' => $request->facebook_url,
                'twitter_url' => $request->twitter_url,
                'youtube_url' => $request->youtube_url,
                'zalo_phone' => $request->zalo_phone,
                'other_info' => $request->other_info,
                'user_id' => $user->id, // Gán giá trị user_id cho profile
            ];
            $profile = $this->profileModel->create($profileData);
        }

        return redirect()->route('user.index');
    }

    public function edit($id)
    {
        $user = $this->userModel->find($id);
        $families = $this->familyModel->all(); // Lấy danh sách gia đình từ model Family

        return view('users.form', compact('user', 'families'));
    }

    public function update(SaveUserRequest $request, $id)
    {
        $user = $this->userModel->find($id);
        $inputs = $request->all();

        if ($request->hasFile('avatar')) {
            // Xóa avatar cũ nếu tồn tại
            if ($user->avatar) {
                Storage::disk('public')->delete($user->avatar);
            }

            // Lưu avatar mới
            $avatarPath = $request->file('avatar')->store('avatars', 'public');
            $inputs['avatar'] = $avatarPath;
        }

        // Lưu trường family_name vào bảng families và gán family_id cho người dùng
        if ($request->has('family_name')) {
            $family = $this->familyModel->create(['name' => $request->family_name]);
            $family_id = $family->id; // Lấy id của gia đình mới được tạo
            $inputs['family_id'] = $family_id;
        }

        $user->update($inputs);

        // Kiểm tra xem có nhập thông tin profile hay không
        if ($request->filled('facebook_url') || $request->filled('twitter_url') || $request->filled('youtube_url') || $request->filled('zalo_phone') || $request->filled('other_info')) {
            // Nếu có nhập thông tin profile
            if ($user->profile) {
                // Nếu user đã có profile, cập nhật thông tin profile
                $profileData = [
                    'facebook_url' => $request->facebook_url,
                    'twitter_url' => $request->twitter_url,
                    'youtube_url' => $request->youtube_url,
                    'zalo_phone' => $request->zalo_phone,
                    'other_info' => $request->other_info,
                ];
                $user->profile->update($profileData);
            } else {
                // Nếu user chưa có profile, tạo mới profile và liên kết với user
                $profileData = [
                    'facebook_url' => $request->facebook_url,
                    'twitter_url' => $request->twitter_url,
                    'youtube_url' => $request->youtube_url,
                    'zalo_phone' => $request->zalo_phone,
                    'other_info' => $request->other_info,
                    'user_id' => $user->id, // Gán giá trị user_id cho profile
                ];
                $profile = $this->profileModel->create($profileData);
            }
        } elseif ($user->profile) {
            // Nếu không nhập thông tin profile và user đã có profile, xóa profile
            $user->profile->delete();
        }

        return redirect()->route('user.index');
    }

    public function destroy($id)
    {
        $this->userModel->findOrFail($id)->delete();

        return redirect()->route('user.index');
    }
}
