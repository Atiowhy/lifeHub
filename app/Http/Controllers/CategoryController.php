<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Account;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
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
        return view('masterData.index', compact('dataAccount'));
    }

    public function store(Request $request)
    {
        $idCategori = "CTGR" . date('ymd') . rand(100,999);

        $categpries = Category::create([
            "id" => $idCategori,
            "category_name" => $request->category_name,
        ]);

        if($categpries){
            return redirect()->to('categori/categories')->with('success', 'Input Category success');
        }
    }
}