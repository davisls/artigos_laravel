<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Artigo;
use App\Models\User;

class ArtigoController extends Controller
{
    public function cadastro() {
        $user = auth()->user();
        return view('store', ['user' => $user]);
    }

    public function store(Request $request){

        $artigo = new Artigo;

        if(!$request->title || !$request->description || !$request->preview){

            return back()->with('msg-failed', 'Não foi possível publicar o seu artigo!');

        }

        if(strlen($request->title) < 6 || strlen($request->title) > 30){
            return back()->with('msg-failed', 'Seu título deve conter entre 6 e 30 caracteres');
        }

        if(strlen($request->preview) > 149 && strlen($request->preview) < 200){

            $artigo->title = $request->title;
            $artigo->description = $request->description;
            $artigo->preview = $request->preview;

            $user = auth()->user();
            $artigo->user_id = $user->id;
            $artigo->save();

            return back()->with('msg-success', 'Artigo criado com sucesso!');

        } else {
            return back()->with('msg-failed', 'Sua prévia deve conter entre 150 e 200 caracteres');
        }

        return back()->with('msg-failed', 'Não foi possível publicar o seu artigo!');

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

        $user = auth()->user();

        $artigo = Artigo::findOrFail($id);

        return view('edit', ['artigo' => $artigo, 'user' => $user]);

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
