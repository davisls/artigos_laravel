<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Artigo;
use App\Models\User;

class ArtigoController extends Controller
{
    public function cadastro() {
        return view('store');
    }

    public function store(Request $request){

        $artigo = new Artigo;

        $artigo->title = $request->title;
        $artigo->description = $request->description;

        $user = auth()->user();
        $artigo->user_id = $user->id;
        $artigo->save();

        return redirect('/')->with('msg-success', 'Artigo criado com sucesso!');

    }

    public function show($id){

        $artigo = Artigo::findOrFail($id);
        $artigoOwner = User::where('id', $artigo->user_id)->first()->toArray();
        $user = auth()->user();

        return view('show', ['artigo' => $artigo,
        'artigoOwner' => $artigoOwner, 'user' => $user]);

    }

    public function destroy($id){

        Artigo::findOrFail($id)->delete();

        return redirect('/')->with('msg-success', 'Artigo excluido com sucesso!');

    }

    public function edit($id){

        $artigo = Artigo::findOrFail($id);

        return view('edit', ['artigo' => $artigo]);

    }

    public function update(Request $request){

        Artigo::findOrFail($request->id)->update($request->all());

        return redirect('/')->with('msg-success', 'Artigo editado com sucesso!');

    }

    public function dashboard(){

        $user = auth()->user();
        $artigos = $user->artigos()->get();

        return view('dashboard', ['user' => $user, 'artigos' => $artigos]);
    }

}
