<?php

namespace App\Http\Controllers;

use App\Models\Property;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Laravel\Ui\Presets\React;

class ProfileController extends Controller
{
    public function profile(){
        $users = Auth::user();
        return view('profile.profile',compact('users'));
    }
    public function editForm($id){
        $users = User::find($id);
        return view('profile.edit',compact('users'));
    }
    public function saveEdit($id, Request $request){
        $users = User::find($id);
        $users->fill($request->all());
        if($request->hasFile('file_upload')){
            $newFileName = uniqid(). '-' . $request->file_upload->getClientOriginalName();
            $path = $request->file_upload->storeAs('public/uploads/users', $newFileName);
            $users->avatar = str_replace('public/', '', $path);
        }
        $users->save();
        return redirect(route('UserProfile'));
    }
}
