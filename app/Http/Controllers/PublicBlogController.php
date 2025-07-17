<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class PublicBlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::orderBy('posted_at', 'desc')->paginate(6); // pagination
        return view('blog.index', compact('blogs'));
    }

    public function show(Blog $blog)
    {
        return view('blog.show', compact('blog'));
    }
}
