<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::latest()->get();
        return view('admin.blog.index', compact('blogs'));
    }

    public function create()
    {
        return view('admin.blog.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'media.*' => 'nullable|file|mimes:jpeg,jpg,png,gif,mp4,webm,mov|max:20480',
        ]);

        $mediaPaths = [];

        if ($request->hasFile('media')) {
            foreach ($request->file('media') as $file) {
                $mediaPaths[] = $file->store('uploads', 'public'); // pastikan pakai 'public'
            }
        }

        Blog::create([
            'title' => $request->title,
            'content' => $request->content,
            'media' => $mediaPaths, // otomatis jadi JSON karena di-cast
            'admin_id' => auth('admin')->id(),
            'posted_at' => now(),
        ]);

        return redirect()->route('admin.blog.index')->with('success', 'Post created successfully.');
    }


    public function edit(Blog $blog)
    {
        return view('admin.blog.edit', compact('blog'));
    }

    public function update(Request $request, Blog $blog)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'media.*' => 'nullable|file|mimes:jpeg,jpg,png,gif,mp4,webm,mov|max:20480',
        ]);

        $mediaPaths = $blog->media ?? [];

        if ($request->hasFile('media')) {
            foreach ($request->file('media') as $file) {
                $mediaPaths[] = $file->store('uploads', 'public');
            }
        }

        $blog->update([
            'title' => $validated['title'],
            'content' => $validated['content'],
            'media' => $mediaPaths,
        ]);

        return redirect()->route('admin.blog.index')->with('success', 'Post updated successfully.');
    }


    public function destroy(Blog $blog)
    {
        $blog->delete();
        return redirect()->route('admin.blog.index')->with('success', 'Post deleted.');
    }
    
}
