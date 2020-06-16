@extends('layouts.app', ['title' => $post->title])

@section('content')
    <div class="container">
        <h3>{{ $post->title }}</h3>
        <p>{!! $post->body !!}</p>
        
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#exampleModal">
           Delete
        </button>

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
@endsection