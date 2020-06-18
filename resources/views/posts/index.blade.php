@extends('layouts.app', ['title' => $category->name ?? $tag->name ?? 'All posts'])

@section('content')
    <div class="container">
        <div class="d-flex justify-content-between">
            <div>
                @isset($category)
                    <h4>Category : {{ $category->name }}</h4>
                @endisset

                @isset($tag)
                    <h4>Tag : {{ $tag->name }}</h4>
                @endisset

                @if (!isset($category) && !isset($tag))
                    <h4>All posts</h4>
                @endif
                <hr>
            </div>
            @auth
                <div>
                    <a href="{{ route('posts.create') }}" class="btn btn-primary">New post</a>
                </div>
            @else
                <div>
                    <a href="{{ route('posts.create') }}" class="btn btn-primary">Login to create new post</a>
                </div>
            @endauth
        </div>
        <div class="row">
            @forelse ($posts as $post )
                <div class="col-md-4 mb-4">
                    <div class="card">
                        @if ($post->thumbnail)
                            <img style="height: 225px; object-fit:cover; object-position:center;" src="{{ $post->takeImage() }}" class="card-img-top" alt="image-thumbnail">
                        @else
                            <img style="height: 225px; object-fit:cover; object-position:center;" src="{{ asset('image-default/no-image.png') }}" class="card-img-top" alt="image-thumbnail">
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">
                                {{ $post->title }}
                            </h5>
                            <div>
                                {{ Str::limit($post->body, 100) }} 
                            </div>

                            <a href="/posts/{{ $post->slug }}">Read more</a>
                        </div>

                        <div class="card-footer d-flex justify-content-between align-items-center">
                            <div class="font-weight-light">
                                <small>
                                    Published on: {{ $post->created_at->format('d F, Y') }}
                                    {{-- Published on. {{ $post->created_at->format('d F Y') }}  show full date--}}
                                </small>
                            </div>
                            @can('update', $post)
                                <div>
                                    <a href="/posts/{{ $post->slug }}/edit" class="btn btn-secondary btn-sm">Edit</a>
                                </div>
                            @endcan
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