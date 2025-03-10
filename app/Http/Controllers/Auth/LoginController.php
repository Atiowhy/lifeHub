<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Account;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class LoginController extends Controller
{
    public function index(){
        return view('auth.login');
    }

    public function actionLogin(Request $request){
        // dd($request->all());
        $account = Account::where('email', $request->email)->first();

        if(!$account){
            return back()->with('error', 'email tidak ditemukan');
        }

        if(!Hash::check($request->password, $account->password)){
            return back()->with('error', 'password salah');
        }

        $credentials = $request->only(['email', 'password']);
        if($account && Hash::check($credentials['password'], $account->password)){
            session()->put('name', $account->first_name . ' ' . $account->last_name);
            session()->put('user_id', $account->id);
            // dd(session()->all());
            return redirect()->to('dashboard/general')->with('success', 'Login Success');
        } else {
            return back()->with(['error' => 'Invalid email or password']);
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->to('auth/');
    }
}