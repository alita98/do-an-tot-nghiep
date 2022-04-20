<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function list(){
        $users = User::all();
        return view('admin.user.list',compact('users'));
    }

    public function addForm(){
        return view('admin.user.add');
    }

    public function saveAdd(Request $request){
        $users = new User();
        $users->fill([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role
        ]);
        $users->save();
        return redirect(route('user.list.admin'))->with('msg','Thêm thành công!');
    }

    public function editForm($id){
        $user = User::find($id);
        $users = User::all();
        return view('admin.user.edit',compact('user','users'));
    }

    public function saveEdit($id,Request $request){
        $users = User::find($id);
        $users->fill($request->all());
        $users->save();
        return redirect(route('user.list.admin'))->with('msg','Sửa thành công!');
    }

    public function delete($id){
        User::destroy($id);
        return redirect()->back();
    }
}
