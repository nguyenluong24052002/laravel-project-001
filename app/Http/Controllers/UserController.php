<?php

namespace App\Http\Controllers;

use App\Http\Requests\SaveUserRequest;

use App\Models\User;

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
        User::create($inputs);
        return to_route('user.index');
    }

    public function edit($id)
    {
        return view('users.form', [
            'user' => User::find($id)
        ]);
    }

    public function update(SaveUserRequest $request, $id)
    {   
        $inputs = array_filter($request->all());
        if ($request->password) {
            $inputs['pasword'] = bcrypt($request->password);
        }
        User::find($id)->update($inputs);
        return to_route('user.index');
    }
}
