@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1 class="text-center page-title-margin">Laravel Permissions</h1>
        </div>
    </div>
    <div class="row justify-content-center">
        @foreach($posts as $post)
            <div class="col-md-8 offset-md-2">
                <a href="{{ route('posts.show', ['post' => $post->id]) }}"><h2>{{ $post->title }}</h2></a>
                <p>{{ $post->body }}</p>
                <hr>
            </div>
        @endforeach
    </div>
</div>
@endsection
