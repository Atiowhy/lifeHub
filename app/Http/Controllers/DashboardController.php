<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Account;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dataUser()
    {
        $userId = session()->get('user_id');
        $dataAccount = Account::findOrFail($userId);
        return $dataAccount;
    }

    public function index()
    {
        $dataAccount = $this->dataUser();

        return view('dashboard.index', compact('dataAccount'));
    }

    public function generalDash()
    {
         $data = Account::get();
    //    return $data;
        $dataAccount = $this->dataUser();
        return view('dashboard.general', compact('dataAccount'));
    }

    public function articleDash ()
    {
        $dataAccount = $this->dataUser();
        return view('dashboard.article', compact('dataAccount'));
    }
}
