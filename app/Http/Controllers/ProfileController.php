<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use App\Models\Account;
use App\Models\Article;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = "My Profile";
        $idUser = session()->get('user_id');
        $dataAccount = Account::with('article')->where('id', $idUser )->first();
        $dataCount = $dataAccount->article->count();
        return view('profile.index', compact('title', 'dataAccount', 'dataCount'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $idAccount = session()->get('user_id');
        $editAccount = Account::findOrFail($idAccount);
        if($request->hasFile('photo')){
            $file = $request->file('photo');
            if($editAccount->photo){
                $uploadFile = Cloudinary::upload($file->getRealPath(), [
                    'folder' => 'accounts',
                    'public_id' => $idAccount,
                ]);

                if($uploadFile){
                $photoUrl = $uploadFile->getSecurePath();
                } else {
                return back()->withErrors(['photo' => 'upload file : no file returned']);
            }
            }

            $editAccount->photo = $photoUrl;
        }
        $editAccount->first_name = $request->first_name;
        $editAccount->last_name = $request->last_name;
        $editAccount->title = $request->title;
        $editAccount->email = $request->email;
        $editAccount->phone = $request->phone;
        $editAccount->bio = $request->bio;

        $editAccount->save();
        return redirect()->to('profile/profile');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}