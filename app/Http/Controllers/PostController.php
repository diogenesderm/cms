<?php

namespace App\Http\Controllers;

use App\Http\Requests\Post\CreatePostRequest;
use App\Post;

class PostController extends Controller
{
    /**
     * Undocumented function
     *
     * @return void
     */
    public function index()
    {
        return view('posts.index')->with('posts', Post::all());
    }

    /**
     * Undocumented function
     *
     * @param CreatePostRequest $request
     * @return void
     */
    public function store(CreatePostRequest $request)
    {
        $image = $request->image->store('posts');

        Post::create([
            'title' => $request->title,
            'description' => $request->description,
            'content' => $request->content,
            'image' => $image
        ]);

        session()->flash('success', 'Post Created successfully');

        return redirect(route('posts.index'));
    }
}
