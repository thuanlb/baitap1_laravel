<?php

namespace App\Http\Controllers;

use Illuminate\Support\Arr;
use App\Http\Requests\Users\StoreRequest;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();

        return view('backend.users.index', ['users' => $users,]);
    }

    public function create()
    {
        return view('backend.users.create');
    }

    public function store(StoreRequest $request)
    {
        $data = Arr::except($request->all(), ['_token','avatar']);
        // $data['avatar']= $request->file('avatar')->store('avatars');
        $data['password']=bcrypt($data['password']);
        $user = User::create($data);
        return redirect()->route('users.index');
    }

    public function show(){
        $users = User::all();
        return view('backend.users.index', ['users' => $users,]);
    }

    public function edit($id){
        $data['user'] = User::find($id);
        return view('backend.users.edit',$data);
    }

    public function update(Request $request, $id)
    {
        //
        $data = Arr::except(request()->all(), ["_token"]);
        $user = User::find($id);
        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->dob = $data['dob'];
        $user->role = $data['role'];
        $user->save();

        return redirect()->route('users.index');
    }



    public function destroy($id)
    {
        User::destroy($id);
        return redirect()->route('users.index');
    }


}
