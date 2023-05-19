<?php

namespace App\Http\Controllers;

use App\Models\Login;
use Illuminate\Support\Str;
use App\Mail\VerificationEmail;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;


class LoginController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }
    public function google_call()
    {
        try {
            $user = Socialite::driver('google')->user();         
            $finduser = Login::where('google_id', $user->id)->first();
            if ($finduser) {
                Auth::loginUsingId($finduser->id, true);
                return redirect()->route('home');
            } else {
                $newUser = Login::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'image' => $user->avatar,
                    'token' => $user->token,
                    'google_id' => $user->id,
                    'password' => encrypt('123456dummy')
                ]);
                $finduser = Login::where('google_id', $user->id)->first();
                Auth::loginUsingId($finduser->id, true); 
                return redirect()->route('home');
            }
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }

    public function login()
    {
        return view('login');
    }

    public function postLogin(Request $request)
    {

        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ], [
            'email.required' => 'Vui lòng nhập địa chỉ Email',
            'password.required' => 'Vui lòng nhập Password',
        ]);
        if (Auth::attempt($request->only('email', 'password'))) {

            return redirect()->route('home')->with('success', 'Chúc mừng bạn đã đăng nhập thành công');
        }
        return redirect()->back()->with('failed', 'Xin vui lòng kiểm tra lại tài khoản của bạn');
    }

    public function register()
    {
        return view('register');
    }

    //register
    public function insert(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'email' => 'required|string|email|max:255|unique:users',  
            'password' => 'required|string',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->messages()
            ]);
        } else {
            $user = new Login();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->save();
            return response()->json([
                'status' => 200,
                'message' => 'Đăng ký thành viên thành công'
            ]);
        }
    }

    public function logout(Request $request)
    {     
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('home');
    }


    public function change()
    {
        return view('updatepassword');
    }
    public function forgotPasswordValidate($token)
    {
        $user = Login::where('token', $token)->first();
        if ($user) {
            $email = $user->email;
            return view('reset', compact('email'));
        }
        return redirect()->route('reset.password')->with('failed', 'Mã liên kết đã hết hạn,vui lòng thử đặt lại mật khẩu');
    }
    public function resetPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);

        $user = Login::where('email', $request->email)->first();
        if ($user == null) {
            return back()->with('failed', 'Email chưa đăng ký, vui lòng thử lại!');
        }

        $token = Str::random(60);
        $user['token'] = $token;
        $user->save();

        Mail::to($request->email)->send(new VerificationEmail($user->name, $token));
        return back()->with('message', 'Đăng nhập Email để thay đổi Password');
    }
    public function updatePassword(Request $request)
    {
        $request->validate([
            'password' => 'required',
            'confirm_password' => 'required|same:password'
        ]);

        $user = Login::where('token', $request->token)->first();
        if ($user) {
            $user['password'] = Hash::make($request->password);
            $user->save();
            return redirect()->route('login.list')->with('success', 'Thay đổi Password thành công');
        }
        return redirect()->route('password')->with('failed', 'Thay đổi Password không thành công');
    }
}
