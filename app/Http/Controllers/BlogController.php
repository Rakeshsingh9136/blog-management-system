<?php

namespace App\Http\Controllers;
use App\Models\Post;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->get('search');
        $posts = Post::where('is_published', true)
                     ->where(function($query) use ($search) {
                         if ($search) {
                             $query->where('title', 'like', "%{$search}%")
                                   ->orWhere('content', 'like', "%{$search}%");
                         }
                     })
                     ->paginate(5);
        
        return view('blog.index', compact('posts'));
    }

    public function show(Post $post)
    {
        return view('blog.show', compact('post'));
    }
}
