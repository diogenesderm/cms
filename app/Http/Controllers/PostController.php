<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\Post\CreatePostRequest;
use App\Http\Requests\Post\UpdatePostRequest;
use App\Post;
use App\Tags;

class PostController extends Controller
{

    public function __construct()
    {
        $this->middleware("vefiryCategoriesCount")->only(['create', 'store']);
    }
    /**
     * Undocumented function
     *
     * @return void
     */
    public function index()
    {
        return view('posts.index')->with('posts', Post::all());
    }

    public function create()
    {

        return view('posts.create')->with('categories', Category::all())->with('tags', Tags::all());
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

        $post = Post::create([
            'title' => $request->title,
            'description' => $request->description,
            'content' => $request->content,
            'image' => $image,
            'category_id' => $request->category,
            'published_at' => $request->published_at
        ]);

        if ($request->tags) {
            $post->tag()->attach($request->tags);
        }

        session()->flash('success', 'Post Created successfully');

        return redirect(route('posts.index'));
    }


    public function destroy($id)
    {

        $post = Post::withTrashed()->where('id', $id)->firstOrFail();
        if ($post->trashed()) {

            $post->deleteImage();
            $post->forceDelete();
        } else {
            $post->delete();
        }

        session()->flash('success', 'Post deletado com sucesso');

        return view('posts.index')->with('posts', Post::all());
    }

    /**
     * Mostra todos os posts na lixeira
     *
     * @return void
     */
    public function trashed()
    {

        $trashed = Post::onlyTrashed()->get();

        return view('posts.index')->withPosts($trashed);
    }

    public function edit(Post $post)
    {

        return view('posts.create')->with('post', $post)->with('categories', Category::all())->with('tags', Tags::all());
    }

    public function update(UpdatePostRequest $request, Post $post)
    {

        $data = $request->only(['title', 'description', 'published_at', 'content']);

        if ($request->hasFile('image')) {

            $image = $request->image->store('posts');

            $post->deleteImage();

            $data['image'] = $image;
        }
        if ($request->tags) {
            $post->tag()->sync($request->tags);
        }
        $post->update($data);

        session()->flash('success', 'Post updated sucessfully');

        return redirect(route('posts.index'));
    }

    public function restore($postId)
    {
        $post = Post::withTrashed()->where('id', $postId)->firstOrFail();
        $post->restore();

        session()->flash('success', 'Posts restored successfully');

        return redirect()->back();
    }
}
