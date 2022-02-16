@extends('layouts.mainLayout')

@section('title', 'Cadastro')

@section('content')

@if(session('msg-success'))
    <p class="msg-success">{{ session('msg-success') }}</p>
@endif

@if(session('msg-failed'))
    <p class="text-center alert alert-danger">{{ session('msg-failed') }}</p>
@endif

<div class="container">

    <div class="row">
        <div class="col-md-6 mx-auto mt-4">
            <form action="/store" method="POST">
                @csrf
                <div class="form-group">
                    <label>Title:</label>
                    <input type="text" class="form-control" name="title">
                </div>
                <div class="form-group">
                    <label>Preview:</label>
                    <textarea rows="3" maxlength="200" name="preview" class="form-control"></textarea>
                </div>
                <div class="form-group">
                    <label>Description:</label>
                    <textarea rows="7" name="description" class="form-control"></textarea>
                </div>
                <button type="submit" class="btn btn-primary mb-5">Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection

@section('class-footer', 'footer-absolute')
