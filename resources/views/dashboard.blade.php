@extends('layouts.mainLayout')

@section('title', 'Home')

@section('content')

<div class="container">
    <div class="row">
        <div class="col">
            <h4 class="text-secondary text-center my-4">Seus Artigos:</h4>
            <p></p>
        </div>
    </div>
    <div class="row">
        @foreach ($artigos as $artigo)

            <div class="col-12 col-sm-6 col-md-4">
                <div class="card my-3">
                    <div class="card-body">
                        <h5 class="card-title">{{ $artigo->title }}</h5>
                        <p class="card-text">{{ $artigo->description }}</p>
                        <a href="/artigo/{{ $artigo->id }}" class="btn btn-outline-info">Saber Mais</a>
                    </div>
                </div>
            </div>

        @endforeach
    </div>
</div>

<p class="mt-5"></p>

@endsection
