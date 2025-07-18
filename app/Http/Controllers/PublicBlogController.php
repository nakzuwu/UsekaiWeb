<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class PublicBlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::with('admin') // ini penting
            ->orderBy('posted_at', 'desc')
            ->paginate(6);

        return view('blog.index', compact('blogs'));
    }


    public function show($id)
    {
        $blog = Blog::with('admin')->findOrFail($id); 
        return view('blog.show', compact('blog'));
    }

}
