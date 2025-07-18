@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')

    <div class="flex-1 bg-[#0A0A0A] rounded-xl glow-border p-6 space-y-6">
        <section>
            <h3 class="text-lg font-semibold mb-2">Welcome back, Admin!</h3>
            <p class="text-gray-400">This is your dashboard. Use the sidebar to navigate.</p>
        </section>

        {{-- Statistik Cards --}}
        <section class="grid grid-cols-1 md:grid-cols-3 gap-4">
            {{-- Total Visitors --}}
            <div class="bg-[#121212] p-4 rounded-lg glow-border">
                <h4 class="text-md font-semibold text-gray-100 mb-1">Total Visitors</h4>
                <p class="text-3xl font-bold text-green-400">{{ $totalVisitors }}</p>
            </div>

            {{-- Popular Post This Month --}}
            <div class="bg-[#121212] p-4 rounded-lg glow-border">
                <h4 class="text-md font-semibold text-gray-100 mb-1">Popular Post (This Month)</h4>
                @if ($popularPost)
                    <p class="text-lg font-semibold text-indigo-400">{{ $popularPost->title }}</p>
                    <p class="text-sm text-gray-400">{{ $popularPost->views }} views</p>
                @else
                    <p class="text-gray-400">No data yet</p>
                @endif
            </div>

            {{-- Latest Post --}}
            <div class="bg-[#121212] p-4 rounded-lg glow-border">
                <h4 class="text-md font-semibold text-gray-100 mb-1">Latest Post</h4>
                @if ($latestPost)
                    <p class="text-lg font-semibold text-blue-400">{{ $latestPost->title }}</p>
                    <p class="text-sm text-gray-400">{{ $latestPost->created_at->diffForHumans() }}</p>
                @else
                    <p class="text-gray-400">No recent post</p>
                @endif
            </div>
        </section>

        {{-- Optional: List Latest Blogs --}}
        <section>
            <h3 class="text-lg font-semibold mb-2">Recent Blogs</h3>
            @if ($recentBlogs->count())
                <ul class="list-disc pl-5 space-y-1 text-gray-300">
                    @foreach ($recentBlogs as $blog)
                        <li>
                            <span class="font-semibold text-white">{{ $blog->title }}</span>
                            <span class="text-sm text-gray-400">({{ $blog->created_at->format('M d, Y') }})</span>
                        </li>
                    @endforeach
                </ul>
            @else
                <p class="text-gray-400">No blog posts yet.</p>
            @endif
        </section>
    </div>

@endsection
