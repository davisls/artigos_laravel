@extends('layouts.mainLayout')

@section('title', 'Home')

@section('content')

@if(session('msg-success'))
    <p class="msg-success">{{ session('msg-success') }}</p>
@endif

@if(session('msg-failed'))
    <p class="text-center alert alert-danger">{{ session('msg-failed') }}</p>
@endif

<div class="container mt-4">
    <div class="row">
            @foreach ($artigos as $artigo)

                <div class="col-12 col-sm-6 col-md-4">
                    <div class="card my-3">
                        <div class="card-body">
                            <h5 class="card-title">{{ $artigo->title }}</h5>
                            <p class="card-text">{{ $artigo->preview }}</p>
                            <a href="/artigo/{{ $artigo->id }}" class="btn btn-outline-info">Saber Mais</a>
                        </div>
                    </div>
                </div>

            @endforeach
    </div>
</div>

<p class="mt-5"></p>

@endsection
