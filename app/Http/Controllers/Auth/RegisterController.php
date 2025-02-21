<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Account;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
// use RealRashid\SweetAlert\Facades\Alert;
class RegisterController extends Controller
{

    public function index()
    {
        return view('auth.register');
    }

    public function actionRegister(Request $request)
    {
           $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:accounts,email',
            'password' => 'required|min:8|confirmed',
            'country' => 'nullable|string|max:100',
            'province' => 'nullable|string|max:100',
            'city' => 'nullable|string|max:255',
            'postal_code' => 'nullable|string|max:10'
        ]);

        $account = Account::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'country' => $request->country,
            'province' => $request->province,
            'city' => $request->city,
            'postal_code' => $request->postal_code,
        ]);

        if(!$account){
            return back()->with('error', __($account));
        } else {
            // Alert::success('Register success', 'You can now login');
            return redirect()->to('auth/')->with('success', 'Register success, You can login now');
        }
    }
}
