<?php

namespace Theater\Http\Controllers\admin;

use Illuminate\Http\Request;

use Theater\Entities\Region;
use Theater\Http\Requests;
use Theater\Http\Controllers\Controller;
use Theater\User;

class AdminController extends Controller
{
    public function index(){
        $users = User::whereIn('role_id', [1,3])->paginate(10);
        return view('admin.usersList', compact('users'));
    }

    public function edit($id){
        $user = User::find($id);
        $regions = Region::all();
        return view('admin.createUser', compact('user', 'regions'));
    }

    public function update(Request $request, $id){
        $user = User::find($id);
        $user->update($request->all());
        return redirect()->route('admin.usersList')->with('Success', '¡El usuario ha sido actualizado!');
    }
}
