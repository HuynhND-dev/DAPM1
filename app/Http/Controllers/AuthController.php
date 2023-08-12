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
            return redirect("login")->with('errors','Sai tên đăng nhập hoặc mật khẩu');
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
            'email' => 'required|max:255|min:5',
            'avata' => 'image|mimes:png,jpg,jpeg|max:2048',
            'phone' => 'required|max:999999999999999|min:0|numeric',
        ],[
            'password.confirmed' => 'Xac nhan mat khau khong trung khop!',
            'password.min' => 'Do dai mat khau qua ngan!',
            'avata' => 'Chi duoc tai HINH ANH'
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
        return back()->withErrors('Dang ky that bai');
    }

}
