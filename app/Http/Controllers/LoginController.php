<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class LoginController extends Controller
{
    public function loginForm(){
        return view('auth.login');
    }

    public function saveLogin(Request $request){
        $credentials = $request->validate([
            'email' => ['required'],
            'password' => ['required'],
        ]);

        if(Auth::attempt($credentials)) {
            $user = Auth::user();
            $user->last_login = Carbon::now();
            $user->save();
            $request->session()->regenerate();
            if($user->role=="USR"){
                return redirect(route('welcome'));
            }
            if($user->role=="TT"){
                return redirect(route('tutor.dashboard'));
            }
            if($user->role=="ADM"){
                return redirect(route('department.list'));
            }
        }else {
            return redirect()->back()->with('msg', 'Tài khoản Email/mật khẩu không chính xác');
        }
    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect(route('welcome'));
    }

    public function registerForm(){
        return view('auth.register');
    }

    public function saveRegister(Request $request){
        $request->validate(
            [
            'email' => 'required|unique:users|regex:/([a-z0-9]+@fpt.edu.vn)/',
            'password' => 'required|min:6|max:20',
            'password_confirmation' => 'required|same:password',
            'name'=>'required|min:3|max:20',
            ],
            [
                'email.required' => 'Hãy nhập email',
                'email.unique' => 'Đã tồn tại người dùng này',
                'email.regex' => 'Email không hợp lệ',
                'password.required' => 'Hãy nhập mật khẩu',
                'password.min' => 'Hãy nhập ít nhất 6 kí tự',
                'password_confirmation.same' => 'Xác nhận mật khẩu không khớp với mật khẩu',
                'password_confirmation.required'=> 'Hãy nhập xác nhận mật khẩu',
                'name.required' => 'Hãy nhập tên của bạn',
                'name.min' => 'Mật khẩu có ít nhất 3 ký tự và nhiều nhất 20 ký tự',
                'name.max' => 'Mật khẩu có ít nhất 3 ký tự và nhiều nhất 20 ký tự'
            ]
        );

        $users = User::all();
        foreach ($users as $users) {
            if ($users->email == $request->email) {
                return redirect()->back()->with('msg', 'Username này đã được sử dụng');
            } else {
                $model = new User();
                $model->fill([
                    'name' => $request->name,
                    'email' => $request->email,
                    'password' => Hash::make($request->password),
                ]);
                $model->save();
                return redirect(route('login'))->with('alert','Tạo tài khoản mới thành công!');
            }
        }
    }
    
    //Google Login
    public function redirectToGoogle(){
        return Socialite::driver('google')->redirect();
    }

    //Google callback
    public function handleGoogleCallback(){
        $user = Socialite::driver('google')->stateless()->user();
        $this->createOrUpdateUser($user,'google');
        $mail = substr($user->email,-11);
        if(substr($user->email,-11)=="@fpt.edu.vn" && Auth::user()->role === 'ADM'){
            return redirect()->route('admin.dashboard');
        }elseif(substr($user->email,-11)=="@fpt.edu.vn" && Auth::user()->role === 'USR'){
            return redirect()->route('welcome');
        }elseif(substr($user->email,-11)=="@fpt.edu.vn" && Auth::user()->role === 'TT'){
            return redirect()->route('tutor.dashboard');
        }else{
            return redirect()->route('login')->with('msg1','Tài khoản Google không hợp lệ');
        }
    }
    
    private function createOrUpdateUser($data,$provider){
        $user = User::where('email',$data->email)->first();
        $last_login = Carbon::now();

        if($user){
            $user->update([
                'provider' => $provider,
                'provider_id' => $data->id,
                'avatar' => $data->avatar,
                'last_login' => $last_login
            ]);
        }else{
            if(substr($data->email,-11)=="@fpt.edu.vn"){
                $user = User::create([
                    'name' => $data->name,
                    'email' => $data->email,
                    'provider' => $provider,
                    'provider_id' => $data->id,
                    'avatar' => $data->avatar,
                    'last_login' => $last_login
                ]);
            } else{
                return redirect(route('login'));
            }
        }
        Auth::login($user);
    }
}
