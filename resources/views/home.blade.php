@extends('layouts.app')

@section('content')
<div class="container">
    <div>
        <h4>Home</h4>
    </div>

    <hr>

    <div class="row">
        @foreach ($posts as $post)
            <div class="col-md-4">
                <div class="card mb-4">
                    @if ($post->thumbnail)
                        <a href="{{ route('posts.show', $post->slug) }}">
                            <img style="height: 220px; object-fit:cover; object-position:center;" src="{{ $post->takeImage() }}" class="card-img-top" alt="image-thumbnail">
                        </a>
                    @else
                        <a href="{{ route('posts.show', $post->slug) }}">
                            <img style="height: 220px; object-fit:cover; object-position:center;" src="{{ asset('image-default/no-image.png') }}" class="card-img-top" alt="image-thumbnail">
                        </a>
                    @endif

                    <div class="card-body">
                        <div>
                            <small>
                                <a href="{{ route('categories.show', $post->category->slug) }}" class="text-secondary">
                                    {{ $post->category->name }} - 
                                </a>

                                @foreach ($post->tags as $tag)
                                    <a class="text-secondary" href="{{ route('tags.show', $tag->slug) }}">{{$tag->name }}</a>
                                @endforeach
                            </small>
                        </div>

                        <h5>
                            <a href="{{ route('posts.show', $post->slug) }}" class="text-dark">
                                {{ $post->title }}
                            </a>
                        </h5>

                        <div class="text-secondary my-2">
                            {{ Str::limit($post->body, 130) }} 
                        </div>

                        <div class="text-secondary d-flex justify-content-between align-items-center mt-2">
                            <div class="media align-items-center">
                                <img width="40" class="rounded-circle align-self-center mr-3" src="{{ $post->author->avatar() }}" class="ml-3" alt="...">
                                <div class="media-body">
                                    <div>
                                        <small>{{ $post->author->name }}</small>
                                    </div>
                                </div>
                            </div>

                            <div class="font-weight-light">
                                <small>
                                    Published on: {{ $post->created_at->format('d F, Y') }}
                                    {{-- Published on. {{ $post->created_at->format('d F Y') }}  show full date--}}
                                </small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
