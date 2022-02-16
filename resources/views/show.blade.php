@extends('layouts.mainLayout')

@section('title', 'Home')

@section('content')

<div class="container mt-4">
    <div class="row">

        <div class="col">
            <div class="card my-3">
                <div class="card-body">
                    <h5 class="card-title">{{ $artigo->title }}</h5>
                    <p class="card-text">{{ $artigo->description }}</p>
                    <p class="text-muted text-right my-0">Created By: <a href="/profile/{{ $artigoOwner['id'] }}" class="text-muted"> {{ $artigoOwner['name']  }}</a></p>
                    <p class="text-muted text-right my-0">Post At: {{ date('d/m/Y - H:i', strtotime($artigo->created_at))  }}</p>
                    @auth
                        @if($artigo->user_id == $user->id)
                        <div class="row">
                            <a href="/artigo/edit/{{ $artigo->id }}" class="ml-auto mt-3 btn btn-primary">Editar</a>
                            <form action="/artigo/{{ $artigo->id }}" method="POST" class="mx-3 mt-3">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </div>
                        @endif
                    @endauth

                </div>
            </div>
        </div>

    </div>
</div>

@endsection
