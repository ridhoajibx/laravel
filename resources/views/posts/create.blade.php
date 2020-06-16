@extends('layouts.app', ['title' => 'New post'])

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Create new post</div>
                    <div class="card-body">
                        <form action="/posts/store" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" name="title" id="title" class="form-control">
                                @error('title')
                                    <small class="text-danger mt-2">
                                        {{$message}}
                                    </small>    
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="body">Body</label>
                                <textarea class="form-control" name="body" id="body" rows="5" placeholder="Create your post here!"></textarea>
                                @error('body')
                                    <small class="text-danger mt-2">
                                        {{$message}}
                                    </small>    
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">Create</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop