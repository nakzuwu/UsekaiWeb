@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')

    {{-- Main Content --}}
    <div class="flex-1 bg-[#0A0A0A] rounded-xl glow-border p-6">
        <section class="mb-6">
            <h3 class="text-lg font-semibold mb-2">Welcome back, Admin!</h3>
            <p class="text-gray-400">This is your dashboard. Use the sidebar to navigate.</p>
        </section>

        <section>
            <h3 class="text-lg font-semibold mb-2">Recent Blogs</h3>
            <ul class="list-disc pl-5 space-y-1 text-gray-300">
                <li>Blog 1: Coming soon</li>
                <li>Blog 2: Coming soon</li>
            </ul>
        </section>
    </div>

@endsection
    