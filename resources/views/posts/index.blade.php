@extends('layouts.app', ['title' => 'All post'])

@section('content')
    <div class="container">
        <div class="d-flex justify-content-between">
            <div>
                <h4>All posts</h4>
                <hr>
            </div>
            <div>
                <a href="/posts/create" class="btn btn-primary">New post</a>
            </div>
        </div>
        <div class="row">
            @forelse ($posts as $post )
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <div class="card-header"> 
                            {{ $post->title }} 
                        </div>
                        
                        <div class="card-body"> 
                            <div>
                                {{ Str::limit($post->body, 100, '') }} 
                            </div>

                            <a href="/posts/{{ $post->slug }}">Read more</a>
                        </div>

                        <div class="card-footer d-flex justify-content-between">
                            <div class="font-weight-light">
                                <small>
                                    Published on: {{ $post->created_at->diffForHumans() }}
                                    {{-- Published on. {{ $post->created_at->format('d F Y') }}  show full date--}}
                                </small>
                            </div>
                            <div>
                                <a href="/posts/{{ $post->slug }}/edit" class="btn btn-secondary btn-sm">Edit</a>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="alert alert-info col-md-8" role="alert">
                    there're no posts!
                </div>
            @endforelse
        </div>
        <div class="d-flex justify-content-center">
            <div>
                {{ $posts->links() }}
            </div>
        </div>
    </div>
@endsection