@extends('layouts.mainLayout')

@section('title', 'Home')

@section('content')
<div class="container">

    <div class="row">
        <div class="col-md-6 mx-auto mt-5">
            <form action="/store" method="POST">
                @csrf
                <div class="form-group">
                    <label>Title</label>
                    <input type="text" class="form-control" name="title">
                </div>
                <div class="form-group">
                    <label>Description</label>
                    <textarea name="description" class="form-control"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection

@section('class-footer', 'footer-absolute')
