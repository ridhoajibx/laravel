<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::latest()->paginate(6);
        // $posts = Post::simplePaginate(6); => paginate yg hanya menampilka prev & next
        return view('posts.index', compact('posts'));
    }

    public function show(Post $post)
    {
        return view('posts.show', compact('post'));   
    }

    public function create()
    {
        return view('posts.create');    
    }

    public function store(Request $request)
    {
        // cara pertama
        // $post = new Post;
        // $post->title = $request->title;
        // $post->slug = \Str::slug($request->title);
        // $post->body = $request->body;
        // $post->save();
        // return redirect()->to('posts'); redirect function

        // cara kedua
        // Post::create([
        //     'title' => $request->title,
        //     'slug' => \Str::slug($request->title),
        //     'body' => $request->body,
        // ]);

        //Cara ketiga
        // $request->validate([
        //     'title' => 'required|min:3',
        //     'body' => 'required|min:6'
        // ]);
        
        // $post = $request->all();
        // $post['slug'] = \Str::slug($request->title);
        // Post::create($post);
        // return back();

        //cara ke empat
        $attr = $request->validate([
            'title' => 'required|min:3',
            'body' => 'required|min:6'
        ]);
        
        $attr['slug'] = \Str::slug($request->title);
        Post::create($attr);
        return back();
    }
}
