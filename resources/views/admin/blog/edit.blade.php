@extends('layouts.admin')

@section('content')
<div class="p-6 max-w-3xl mx-auto">
  <h1 class="text-2xl font-bold text-white mb-6">Edit Blog Post</h1>

  <form action="{{ route('admin.blog.update', $blog->id) }}" method="POST">
    @csrf @method('PUT')

    <div class="mb-4">
      <label class="block text-white mb-1">Title</label>
      <input type="text" name="title" value="{{ $blog->title }}" class="w-full p-2 rounded bg-gray-700 text-white border border-gray-600" required>
    </div>

    <div class="mb-4">
      <label class="block text-white mb-1">Content</label>
      <textarea name="content" rows="6" class="w-full p-2 rounded bg-gray-700 text-white border border-gray-600" required>{{ $blog->content }}</textarea>
    </div>

    <div class="mb-4">
      <label class="block text-white mb-1">Media (JSON array of URLs)</label>
      <textarea name="media" rows="3" class="w-full p-2 rounded bg-gray-700 text-white border border-gray-600">{{ json_encode($blog->media) }}</textarea>
    </div>

    <button type="submit"
      class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-lg transition">
      Update
    </button>
  </form>
</div>
@endsection
