@extends('layouts.app', ['title' => 'Update post'])

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Update post : {{ $post->title }}</div>
                    <div class="card-body">
                        <form action="/posts/{{ $post->slug }}/edit" method="post">
                            @method('patch')
                            @csrf
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" name="title" id="title" class="form-control" value="{{ old('title') ?? $post->title }}">
                                @error('title')
                                    <small class="text-danger mt-2">
                                        {{$message}}
                                    </small>    
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="body">Body</label>
                                <textarea class="form-control" name="body" id="body" rows="5" placeholder="Create your post here!">{{ old('body') ?? $post->body }}</textarea>
                                @error('body')
                                    <small class="text-danger mt-2">
                                        {{$message}}
                                    </small>    
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop