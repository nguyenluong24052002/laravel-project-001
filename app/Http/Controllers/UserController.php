<?php

namespace App\Http\Controllers;

use App\Http\Requests\SaveUserRequest;
use App\Models\Family;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function index()
    {
        return view('users.index', [
            'users' => User::get(),
            'families' => Family::all(), // Thêm biến $families vào view
        ]);
    }

    public function create()
    {
        $families = Family::all(); // Lấy danh sách gia đình từ model Family

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
            $family = Family::create(['name' => $request->family_name]);
            $family_id = $family->id; // Lấy id của gia đình mới được tạo
            $inputs['family_id'] = $family_id;
        }

        User::create($inputs);

        return redirect()->route('user.index');
    }

    public function edit($id)
    {
        $user = User::find($id);
        $families = Family::all(); // Lấy danh sách gia đình từ model Family

        return view('users.form', compact('user', 'families'));
    }

    public function update(SaveUserRequest $request, $id)
    {
        $user = User::find($id);
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

        // Lưu hoặc cập nhật thông tin gia đình
        if ($request->has('family_name')) {
            $family = Family::firstOrCreate(['name' => $request->family_name]);
            $family_id = $family->id;
            $inputs['family_id'] = $family_id;
        }

        $user->update($inputs);

        return redirect()->route('user.index');
    }

    public function destroy($id)
    {
        User::findOrFail($id)->delete();

        return redirect()->route('user.index');
    }
}
