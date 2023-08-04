<?php

namespace App\Http\Controllers;

use App\Http\Requests\SaveUserRequest;

use App\Models\User;

use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function index()
    {
        return view('users.index',[
            'users' => User::get()
        ]);
    }

    public function create()
    {
        return view('users.form');
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
    
        User::create($inputs);
        return redirect()->route('user.index');
    }

    public function edit($id)
    {
        return view('users.form', [
            'user' => User::find($id)
        ]);
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
    
        $user->update($inputs);
        return redirect()->route('user.index');
    }

    public function destroy($id)
    {
        User::findOrFail($id)->delete();
        return redirect()->route('user.index');
    }
}
