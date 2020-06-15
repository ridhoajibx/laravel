@extends('layouts.app')

@section('title', 'Posts')

@section('content')
    <div class="container">
        <h4>All posts</h4>
        <hr>
        <div class="row">
            @foreach ($posts as $post )
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <div class="card-header"> 
                            {{ $post->title }} 
                        </div>
                        
                        <div class="card-body"> 
                            <div>
                                {{ Str::limit($post->body, 100) }} 
                            </div>

                            <a href="/posts/{{ $post->slug }}">Read more!</a>
                        </div>

                        <div class="card-footer">
                            Published on. {{ $post->created_at->format('d F Y') }}
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="col-md-12">
            {{ $posts->links() }}
        </div>
    </div>
@endsection