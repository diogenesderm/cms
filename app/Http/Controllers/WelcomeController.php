<?php

namespace App\Http\Controllers;

use App\Post;
use App\Tags;
use App\Category;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index()
    {
        return view('welcome')
        ->with('categories', Category::all())
        ->with('tags', Tags::all())
        ->with('posts', Post::all());
    }
}
