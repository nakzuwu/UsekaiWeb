@php use Illuminate\Support\Str; @endphp
@extends('layouts.admin')

@section('content')
    <div class="p-6 bg-[#0A0A0A] min-h-screen">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold text-white">Blog Posts</h1>
            <a href="{{ route('admin.blog.create') }}"
                class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-lg transition">
                + New Post
            </a>
        </div>

        <div class="space-y-4">
            @forelse($blogs as $blog)
                <div class="p-4 bg-gray-900 rounded-lg shadow">
                    <div class="flex justify-between items-start mb-2">
                        <div>
                            <h2 class="text-xl font-semibold text-white">{{ $blog->title }}</h2>
                            <p class="text-gray-400 text-sm">{{ $blog->posted_at ? $blog->posted_at->format('d M Y') : '-' }}
                            </p>
                        </div>
                        <div class="space-x-2">
                            <a href="{{ route('admin.blog.edit', $blog->id) }}"
                                class="text-sm text-blue-400 hover:underline">Edit</a>
                            <form action="{{ route('admin.blog.destroy', $blog->id) }}" method="POST" class="inline">
                                @csrf @method('DELETE')
                                <button class="text-sm text-red-400 hover:underline"
                                    onclick="return confirm('Delete this post?')">
                                    Delete
                                </button>
                            </form>
                        </div>
                    </div>

                    {{-- Render konten --}}
                    <div class="prose prose-invert max-w-none text-white">
                        {!! nl2br(e($blog->content)) !!}
                    </div>

                    {{-- Render media --}}
                    @if (!empty($blog->media) && is_array($blog->media))
                        <div class="mt-4 flex flex-wrap gap-4">
                            @foreach ($blog->media as $media)
                                @if (Str::endsWith($media, ['.jpg', '.jpeg', '.png', '.gif']))
                                    <img src="{{ asset('storage/' . $media) }}" class="w-40 rounded">
                                @elseif(Str::endsWith($media, ['.mp4', '.webm', '.mov']))
                                    <video src="{{ asset('storage/' . $media) }}" controls class="w-64 rounded"></video>
                                @endif
                            @endforeach
                        </div>
                    @endif

                </div>
            @empty
                <p class="text-gray-400">No blog posts found.</p>
            @endforelse
        </div>
    </div>
@endsection
