<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Auth;
class ProfileController extends Controller
{
    public function index()
    {
        
        return view('profile');
    }

    public function update(User $user)
    {

        $userId = auth()->user()->id;
        $data = request()->validate(
            [
                'name' => 'required|min:3',
                'email' => ['required', Rule::unique('users')->ignore($userId)],
                'password' => 'nullable|confirmed|min:8',
                'image' => 'mimes:jpeg,jpg,png'
                ]
            );

        if (request()->has('password')) {
            $data['password'] = Hash::make(request('password'));
        }
        // if(request()->hasFile('image'))
        // $user-> image=$this->uploadFile(request()->file('image'));

        if (request()->hasFile('image')) {
            $path = request()->image->store('users');
            $data['image'] = $path;  
        }
        User::findorfail($userId)->update($data);
        return redirect('/profile');

    }

    public function uploadFile($file){
        $dest=public_path()."/images/";

        //$file = $request->file('image');
        $filename= time()."_".$file->getClientOriginalName();
        $file->move($dest,$filename);
        return $filename;


    }
}
