{{-- resources/views/admin/dashboard.blade.php --}}
@extends('layouts.admin')

@section('title', 'Dashboard')
@section('header', 'Dashboard')

@section('content')
  <section class="bg-gray-800 p-6 rounded-lg shadow">
    <h3 class="text-xl font-semibold mb-2">Welcome back, Admin!</h3>
    <p>This is your dashboard. Use the sidebar to navigate.</p>
  </section>

  <section class="bg-gray-800 p-6 rounded-lg shadow">
    <h3 class="text-xl font-semibold mb-4">Recent Blogs</h3>
    <ul class="list-disc pl-5 space-y-2">
      <li>Blog 1: Coming soon</li>
      <li>Blog 2: Coming soon</li>
    </ul>
  </section>
@endsection
