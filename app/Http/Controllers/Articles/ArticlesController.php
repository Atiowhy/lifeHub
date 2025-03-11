<?php

namespace App\Http\Controllers\Articles;

use App\Http\Controllers\Controller;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use App\Models\Account;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;

class ArticlesController extends Controller
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
        $userId = session()->get('user_id');
        $categories = Category::all();
        $articles = Article::findOrFail($userId);
        return view('article.index', compact('dataAccount', 'categories', 'articles'));
    }

    public function insert()
    {
        $dataAccount = $this->dataUser();
        $categories = Category::all();
        return view('article.addArticle', compact('dataAccount', 'categories'));
    }

    public function store(Request $request)
{
    $request->validate([
        // 'photo' => 'required|image',
        'titile' => 'required|string|max:255',
        'category_id' => 'required|',
        'account_id' => 'required|integer',
        'content' => 'required|string',
    ]);

    $idArticle = "ARTC" . date('ymd') . rand(100, 999);
    $photoUrl = null;

    if ($request->hasFile('photo')) {
            // return response()->json(['error' => 'No file uploaded'], 400);
        $file = $request->file('photo');

        // upload file ke cloudinary
        try {
            $uploadFile = Cloudinary::upload($file->getRealPath(), [
                'folder' => 'articles',
                'public_id' => $idArticle,
            ]);

            // dd($uploadFile);

            if($uploadFile){
                $photoUrl = $uploadFile->getSecurePath();
            } else {
                return back()->withErrors(['photo' => 'upload file : no file returned']);
            }

        } catch (\Exception $e) {
            // Tangani kesalahan upload
            return back()->withErrors(['photo' => 'Upload failed: ' . $e->getMessage()]);
        }
    }

    $article = Article::create([
        "id" => $idArticle,
        "titile" => $request->titile,
        "category_id" => $request->category_id,
        "account_id" => $request->account_id,
        "content" => $request->content,
        "photo" => $photoUrl,
    ]);

    if ($article) {
        return back();
    }  else {
    return back()->withErrors(['error' => 'Failed to create article.']);
    }
}
}