@extends('layouts.app', ['title' => $post->title])

@section('content')
    <div class="container">
        <h3>{{ $post->title }}</h3>
        <div class="text-secondary mb-3">
            <small>
                <a class="text-secondary" href="{{ route('categories.show', $post->category->slug) }}">{{ $post->category->name }}</a> 
                &middot; {{ $post->created_at->format('d F, Y') }}
                &middot;
                @foreach ($post->tags as $tag)
                    <a class="text-secondary" href="/tags/{{ $tag->slug }}">{{ $tag->name }}</a>
                @endforeach
            </small>
            <br>
            <div class="media my-3 align-items-center">
                <img width="60" class="rounded-circle align-self-center mr-3" src="{{ $post->author->avatar() }}" class="ml-3" alt="...">
                <div class="media-body">
                    <div>
                        Author : {{ $post->author->name }}
                    </div>
                    {{ '@' . $post->author->username }}
                </div>
            </div>
        </div>

        <p>{!! nl2br($post->body) !!}</p>
        
        <!-- Button trigger modal -->
        @can ('update', $post)
            <div class="d-flex">
                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#exampleModal">
                    Delete
                </button>
                
                <div class="ml-2">
                    <a href="/posts/{{ $post->slug }}/edit" class="btn btn-secondary btn-sm">Edit</a>
                </div>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Apa anda yakin menghapusnya?</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <div class="modal-body">
                            <div>
                                <p>{{ $post->title }}</p>
                                <small>Published : {{ $post->created_at->format('d F, Y') }}</small>
                            </div>
                            <div class="d-flex justify-content-end">
                                <form action="/posts/{{ $post->slug }}/delete" method="post">
                                    @csrf
                                    @method("delete")
                                    <button type="submit" class="btn btn-sm btn-danger">Iya</button>
                                    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Tidak</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endcan
    </div>
@endsection