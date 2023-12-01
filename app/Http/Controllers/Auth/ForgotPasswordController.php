<?php



namespace App\Http\Controllers\Auth;



use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use DB;

use Carbon\Carbon;

use App\Models\User;

use Mail;

use Hash;

use Illuminate\Support\Str;



class ForgotPasswordController extends Controller

{

    /**

     * Write code on Method

     *

     * @return response()

     */

    public function showForgetPasswordForm()
    {
        return view('client.auth.forgetPassword', ['title' => 'Đặt lại mật khẩu']);
    }



    /**

     * Write code on Method

     *

     * @return response()

     */

    public function submitForgetPasswordForm(Request $request)
    {
        $request->validate([
            'username' => 'required|exists:users',
        ], [
            'username.exists' => 'Tên đăng nhập không tồn tại',
            'username.required' => 'Tên đăng nhập không thể để trống',
        ]);

        $token = Str::random(64);

        $email = DB::table('users')
            ->where([
                'username' => $request->username
            ])
            ->value('email');

        $emailParts = explode('@', $email);
        $start2 = substr($emailParts[0], 0, 3);
        $end2 = substr($emailParts[0], -2);

        $mailReplace = $start2 . '***' . $end2 . $emailParts[1];

        DB::table('password_resets')->insert([
            'email' => $email,
            'token' => $token,
            'created_at' => Carbon::now()
        ]);

        Mail::send('client.email.forgetPassword', ['token' => $token], function($message) use($email){
            $message->to($email);
            $message->subject('Đặt lại mật khẩu!');
        });

        return back()->with('message', "Thông tin đặt lại mật khẩu đã được gửi tới email $mailReplace!");

    }

    /**

     * Write code on Method

     *

     * @return response()

     */

    public function showResetPasswordForm($token) {
        return view('client.auth.forgetPasswordLink', ['token' => $token, 'title' => 'Đặt lại mật khẩu']);
    }



    /**

     * Write code on Method

     *

     * @return response()

     */

    public function submitResetPasswordForm(Request $request)
    {
        $request->validate([
            'password' => 'required|string|min:6|confirmed',
            'password_confirmation' => 'required'
        ],[
            'password.min' => 'Mật khẩu ít nhất 6 ký tự',
            'password.confirmed' => 'Mật khẩu nhập lại chưa chính xác',
        ]);

        $updatePassword = DB::table('password_resets')
            ->where([
                'token' => $request->token
            ])
            ->first();

        if(!$updatePassword){
            return redirect()->route('login')->with('errors','Mã đổi mật khẩu đã hết hạn');
        }

        $user = User::where('email', $updatePassword->email)
            ->update(['password' => Hash::make($request->password)]);

        DB::table('password_resets')->where(['email'=> $updatePassword->email])->delete();

        return redirect('/login')->with('success', 'Cập nhật mật khẩu thành công!');

    }

}
