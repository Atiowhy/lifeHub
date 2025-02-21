<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;

class ForgotPassController extends Controller
{
    public function index()
    {
        return view('auth.forgotPassword');
    }

    public function sendLink(Request $request)
    {

    try {
        $request->validate([
            'email' => 'required|email|exists:accounts,email',
        ]);

       $reset = Password::broker('accounts')->sendResetLink($request->only('email'));


        return $reset === Password::RESET_LINK_SENT
            ? back()->with('success', 'Your Reset Link Has Been Sent To Your Email')
            : back()->with('error', __($reset));
    } catch (\Exception $e) {
        return back()->with('error', 'Error: ' . $e->getMessage());
    }

    }

    public function showResetForm(){
        return view('auth.resetPassword');
    }

    public function reset(Request $request)
    {
        // dd();
        $request->validate([
            'email' => 'required|email|exists:accounts,email',
            'password' => 'required|min:8|confirmed',
            'password_confirmation' => 'required',
            'token' => 'required',
        ]);

        $reset_status = Password::broker('accounts')->reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function($user, $password){
                $user->forceFill([
                    'password' => Hash::make($password)
                ])->save();
            }
        );

        return $reset_status == Password::PASSWORD_RESET
        ? redirect()->to('auth/')->with('success', __($reset_status))
        : back()->with('error', __($reset_status));
    }

}
