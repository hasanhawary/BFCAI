<?php

namespace App\Http\Controllers\Instructor;

use App\Instructor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class InstructorAuthController extends Controller
{

    public function __construct()
    {
        $this->middleware('guest:instructor')->except('logout');
    }

    public function login()
    {
        return view('Instructor.auth.login');
    }
    public function register()
    {
        return view('Instructor.auth.register');
    }
    public function forgot()
    {
        return view('Instructor.auth.passwords.email');
    }
    public function do_register(Request $request)
    {
        $data = $this->validate(request(), [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:instructors'],
            'password' => ['required', 'string', 'min:4', 'confirmed'],
        ]);

        Instructor::create([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
        session()->flash('success', 'Login Success');
        return redirect('/instructor');
    }
    public function do_login(Request $request)
    {
        // dd($request->all());

        $this->validate(request(), [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $remember = request('remember') == 1 ? true : false;
        if (auth()->guard('instructor')->attempt(['email' => request('email'), 'password' => request('password')], $remember)) {
            return redirect('/instructor');
        } else {
            session()->flash('error', 'The password or email address is incorrect');
            return redirect()->back()->withErrors('The password or email address is incorrect!');
        }
    }

    public function logout()
    {
        auth()->guard('instructor')->logout();
        return redirect('instructor/login');
    }

    //

    // public function forgot_post()
    // {
    //     $Instructor = Instructor::where('email', request('email'))->first();

    //     if (!empty($Instructor)) {
    //         $token = app('Auth.password.broker')->createToken($Instructor);
    //         $data = DB::table('password_resets')->insert([
    //             'email' => $Instructor->email,
    //             'token' => $token,
    //             'created_at' => Carbon::now(),
    //         ]);
    //         Mail::to($Instructor->email)->send(new InstructorResetPassword(['data' => $Instructor, 'token' => $token]));
    //         session()->flash('success', trans('Instructor.the_link_reset_sent'));
    //         return back();
    //     }
    //     return back();
    // }

    // public function reset_password($token)
    // {
    //     $check_data = DB::table('password_resets')->where('token', $token)->where('created_at', '>', Carbon::now()->subHours(2))->first();
    //     if (!empty($check_data)) {
    //         return view('Instructor.reset', ['data' => $check_data]);
    //     } else {
    //         return redirect(aurl('forgot_password'));
    //     }
    // }
    // public function reset_password_post($token)
    // {
    //     $this->validate(request(), [
    //         'password' => 'required|confirmed',
    //         'password_confirmation' => 'required'
    //     ]);

    //     $check_data = DB::table('password_resets')->where('token', $token)->where('created_at', '>', Carbon::now()->subHours('2'))->first();
    //     if (!empty($check_data)) {
    //         $Instructor = Instructor::where('email', $check_data->email)->update([
    //             'email' => $check_data->email,
    //             'password' => bcrypt(request('password')),
    //         ]);
    //         DB::table('password_resets')->where('email', request('email'))->delete();
    //         Instructor()->attempt(['email' => request('email'), 'password' => \request('password')]);
    //         return redirect(aurl());
    //     }
    //     return back();
    // }
}
