@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1 class="text-center page-title-margin">Edit Post</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8 offset-md-2">
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
            <form method="POST" action="{{ route('posts.update', ['post' => $post->id]) }}">
                @method('PUT')
                @csrf
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" id="title" name="title" placeholder="Insert title"
                           value="{{ old('title', $post->title) }}">
                </div>
                <div class="form-group">
                    <label for="body">Description</label>
                    <textarea class="form-control" name="body" id="body" rows="4">{{ old('body', $post->body) }}</textarea>
                </div>
                @can('posts.publish')
                    <div class="form-group">
                        <label for="published">Published</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="published" id="published-true" value="true"
                                    {{ $post->published == 1 ? 'checked' : '' }}>
                            <label class="form-check-label" for="published-true">
                                True
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="published" id="published-false" value="false"
                                    {{ $post->published == 0 ? 'checked' : '' }}>
                            <label class="form-check-label" for="published-false">
                                False
                            </label>
                        </div>
                    </div>
                @endcan
                <button type="submit" class="btn btn-primary">Update</button>&nbsp;&nbsp;
                <button type="reset" class="btn btn-default">Reset</button>&nbsp;&nbsp;
                <a class="btn btn-info" href="{{ url('/') }}">Back</a>
            </form>
        </div>
    </div>
</div>
@endsection
