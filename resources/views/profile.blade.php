@extends('layouts.mainLayout')

@section('title', 'Home')

@section('content')

<div class="container mt-4">
    <div class="row">

        <div class="col-9 mx-auto">
            <div class="card my-3">
                <div class="card-body">
                    <h5 class="card-title text-center">{{ $user_show->name }}</h5>
                    <img src="{{url('img/' . $user_show->profile_photo)}}" class="rounded mx-auto d-block mt-4" width="250px" height="200px">

                    @if($user->id == $user_show->id)
                        <div class="row">
                            <form action="/profile/edit/{{$user->id}}" method="POST" class="mx-auto mt-3" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="text-center">
                                    <input type="file" class="file-input" id="file" name="image">
                                    <label class="file-input-label" for="file">Escolha uma Imagem</label>
                                </div>
                                <button type="submit" class="btn btn-outline-secondary mt-2">Salvar Alterações</button>
                            </form>
                        </div>
                    @endif


                </div>
            </div>
        </div>

    </div>
</div>

@endsection
