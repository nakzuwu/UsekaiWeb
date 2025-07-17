<?php

namespace App\Http\Controllers;
use App\Models\Blog;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard', [
            'totalVisitors' => DB::table('visitor_logs')->count(), // atau ambil dari analytics service
            'popularPost' => Blog::orderBy('views', 'desc')->whereMonth('created_at', now()->month)->first(),
            'latestPost' => Blog::latest()->first(),
            'recentBlogs' => Blog::latest()->take(5)->get(),
        ]);
    }

    public function profile()
    {
        return view('admin.profile');
    }
}
