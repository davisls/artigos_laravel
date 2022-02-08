<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Artigo;

class HomeController extends Controller
{
    public function index() {

        $search = request('search');

        if($search){
            $artigos = Artigo::where([
                ['title', 'like', '%'.$search.'%']
            ])->get();
        } else {
            $artigos = Artigo::all();
        }


        return view('home', ['artigos' =>  $artigos, 'search' => $search]);
    }
}
