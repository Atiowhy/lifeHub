<?php

namespace App\Http\Controllers\Articles;

use App\Http\Controllers\Controller;
use App\Models\Account;
use App\Models\Article;
use Illuminate\Http\Request;

class DashboardArticle extends Controller
{
    public function dataUser(){
        $idUser = session()->get('user_id');
        $dataAccount = Account::findOrFail($idUser);
        return $dataAccount;
    }
    public function index(){
        $dataAccount = $this->dataUser();
        $articles = Article::where('account_id', $dataAccount->id)->with('category', 'user')->orderBy('created_at','desc')->paginate(10);
        // return $articles;
        return view('article.index', compact('dataAccount', 'articles'));
    }

    public function show($id){
        $dataAccount = $this->dataUser();
        $article = Article::findOrFail($id);
    }
}