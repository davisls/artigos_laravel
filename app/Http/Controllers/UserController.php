<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function show($id){

        $user = auth()->user();
        $user_show = User::findOrFail($id);

        return view('profile', ['user_show' => $user_show, 'user' => $user]);

    }

    public function update(Request $request){

        $user = auth()->user();

        if($request->hasFile('image') && $request->file('image')->isValid()){

            $imagem = $request->image;

            $extensaoImagem = $imagem->extension();

            $imagemName = md5(strtotime('now')) . '.' . $extensaoImagem;

            $imagem->move(public_path('img'), $imagemName);

            //Salvar Imagem no Model Aqui

            $user->profile_photo = $imagemName;
            $user->save();

            return back();

        }

    }
}
