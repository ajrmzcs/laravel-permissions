@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1 class="text-center page-title-margin">{{ $post->title }}</h1>
        </div>
    </div>
    <div class="row justify-content-center">
            <div class="col-md-8 offset-md-2">
                <p>{{ $post->body }}</p>

                @can('edit posts')
                    <a class="btn btn-primary" href="{{ route('posts.edit', ['post' => $post->id]) }}">Edit</a>
                @endcan

                @can('delete posts')
                    <form style="Display:inline" action="{{ route('post.destroy', ['post' => $post->id]) }}" method="POST">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                @else
                    <a class="btn btn-info" href="{{ url('/') }}">Back</a>
                @endCan

            </div>
    </div>
</div>
@endsection
