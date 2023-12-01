<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Auth;
use Session;

class AuthController extends Controller
{
    public function index() {
        return view('client.login', ['title' => 'Đăng nhập']);
    }

    public function registration() {
        return view('client.register', ['title' => 'Đăng ký']);
    }

    public function login(Request $request)
    {
        request()->validate([
            'username' => 'required',
            'password' => 'required',
        ]);
        $credentials = [
            'username' => $request->username,
            'password' => $request->password,
        ];
        if (Auth::attempt($credentials)) {

            if (Auth::user()->role_ID === 1) {
                return redirect()->route('candidate-list');
            } else {
                return redirect()->route('index');
            }
        } else {
            return redirect("login")->with('error','Sai tên đăng nhập hoặc mật khẩu');
        }
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('index');
    }

    public function create(Request $request)
    {
        $request->validate([
            'username' => 'required|max:255|min:3|unique:users,username',
            'password' => 'max:255|confirmed',
            'email' => 'required|max:255|min:5|unique:users,email',
            'phone' => 'required|max:999999999999999|min:99999999|numeric',
        ],[
            'username.required' => 'Tên đăng nhập không được để trống',
            'username.min' => 'Tên đăng nhập ít nhất 3 ký tự',
            'username.unique' => 'Tên đăng nhập đã có',
            'password.confirmed' => 'Nhập lại mật khẩu không trùng khớp',
            'password.min' => 'Mật khẩu quá ngắn',
            'email.unique' => 'Email đã được đăng ký',
            'phone.min' => 'Số điện thoại không hợp lệ',
            'phone.numeric' => 'Số điện thoại không hợp lệ'
        ]);

        $user = new User;
        $user->username = $request->username;
        $user->password = bcrypt($request->username);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->role_ID = 3;
        $user->create_at = now();
        $user->save();

        if ($user) {
            return redirect()->intended('login')->withSuccess('Đăng ký thành công');
        }
        return back()->with('error','Đăng ký thất bại');
    }

}
