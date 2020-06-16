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
                            @include('posts.partials.form', ['submit' => 'Create'])
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop