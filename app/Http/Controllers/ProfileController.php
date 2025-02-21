<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Account;
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
        $dataAccount = Account::findOrFail($idUser);
        return view('profile.index', compact('title', 'dataAccount'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $idAccount = session()->get('user_id');
        $editAccount = Account::findOrFail($idAccount);

        if($request->hasFile('photo')){
            if($editAccount->photo){
                $oldImagePath = public_path('images/' . $editAccount->photo);
                if(file_exists($oldImagePath)){
                    unlink($oldImagePath);
                }
            }

            //upload gambar baru
            $imageName = 'IMG' . time() . '.' .  $request->photo->extension();
            $request->photo->move(public_path('images'), $imageName);

            // save foto
            $editAccount->photo = $imageName;
        }

        $editAccount->first_name = $request->first_name;
        $editAccount->last_name = $request->last_name;
        $editAccount->title = $request->title;
        $editAccount->email = $request->email;
        $editAccount->phone = $request->phone;
        $editAccount->bio = $request->bio;

        $editAccount->save();

        return redirect()->to('profile');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}