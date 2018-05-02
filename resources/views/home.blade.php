@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1 class="text-center page-title-margin">Laravel Permissions</h1>
            {{--Alerts--}}
            @if (session('status'))
                <div class="alert alert-success">
                    <a href="#" class="close" data-dismiss="alert">&times;</a>
                    {{ session('status') }}
                </div>
            @endif
            {{--Error--}}
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        <a href="#" class="close" data-dismiss="alert">&times;</a>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
    </div>
    <div class="row">
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
