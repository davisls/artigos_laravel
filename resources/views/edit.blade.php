@extends('layouts.mainLayout')

@section('title', 'Editar')

@section('content')
<div class="container">

    <div class="row">
        <div class="col-md-6 mx-auto mt-4">
            <form action="/artigo/edit/{{$artigo->id}}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label>Title:</label>
                    <input type="text" class="form-control" name="title" value={{ $artigo->title }}>
                </div>
                <div class="form-group">
                    <label>Preview:</label>
                    <textarea rows="3" maxlength="200" name="preview" class="form-control">{{ $artigo->description }}</textarea>
                </div>
                <div class="form-group">
                    <label>Description:</label>
                    <textarea rows="7" name="description" class="form-control">{{ $artigo->description }}</textarea>
                </div>
                <button type="submit" class="btn btn-primary mb-5">Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection

@section('class-footer', 'footer-absolute')
