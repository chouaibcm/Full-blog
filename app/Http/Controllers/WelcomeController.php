<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Tag;
use App\Category;

class WelcomeController extends Controller
{
    public function index(Request $request){
        $categories=Category::all();
        $tags=Tag::all();
        $posts = Post::when($request->search, function($q) use ($request){
            return $q->where('title','LIKE', '%' . $request->search . '%');
        })->latest()->paginate(3);

        return view('welcome',compact('categories', 'tags', 'posts'));
    }
}
