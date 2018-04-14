@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <h1>{{ $blog->title }}</h1>
            <p>By: {{ $blog->user->name }}</p>
        </div>
        <hr class="col-md-12">
        <div class="col-md-12">
            {!! $blog->content !!}
        </div>
        <hr class="col-md-12">
        <div class="col-md-12">
            <p class="small">{{ $blog->created_at }}</p>
        </div>
    </div>
</div>
@endsection
