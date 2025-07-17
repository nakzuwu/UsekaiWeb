@extends('layouts.app')

@section('content')
<div class="container py-4">
    <a href="{{ route('blog.index') }}" class="btn btn-secondary mb-3">← Kembali</a>

    <h1>{{ $blog->title }}</h1>
    <p><small>Diposting pada {{ $blog->posted_at ?? $blog->created_at->format('d M Y') }}</small></p>

    @if(!empty($blog->media) && is_array(json_decode($blog->media, true)))
        @foreach(json_decode($blog->media) as $media)
            <img src="{{ $media }}" class="img-fluid mb-3" alt="Media">
        @endforeach
    @endif

    <div class="content">
        {!! $blog->content !!}
    </div>
</div>
@endsection
