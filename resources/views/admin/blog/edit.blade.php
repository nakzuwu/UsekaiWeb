@extends('layouts.admin')

@section('title', 'Edit Blog')

@section('content')
    <div class="p-6 max-w-3xl mx-auto bg-[#0A0A0A] min-h-screen">

        {{-- Tombol Back --}}
        <div class="mb-4">
            <a href="{{ url()->previous() }}"
                class="inline-block bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded transition">
                ← Back
            </a>
        </div>

        <h1 class="text-2xl font-bold text-white mb-6">Edit Blog Post</h1>

        <form action="{{ route('admin.blog.update', $blog->id) }}" method="POST" enctype="multipart/form-data" id="blogForm">
            @csrf
            @method('PUT')

            {{-- Title --}}
            <div class="mb-4">
                <label class="block text-white mb-1">Title</label>
                <input type="text" name="title" value="{{ $blog->title }}"
                    class="w-full p-2 rounded bg-[#0A0A0A] text-white border border-[#EF4444]" required>
            </div>

            {{-- Content --}}
            <div class="mb-4">
                <label class="block text-white mb-1">Content</label>
                <textarea name="content" rows="6" class="w-full p-2 rounded bg-[#0A0A0A] text-white border border-[#EF4444]"
                    required>{{ $blog->content }}</textarea>
            </div>

            {{-- Existing Media --}}
            @if (!empty($blog->media) && is_array($blog->media))
                <div class="mb-6">
                    <label class="block text-white mb-2">Existing Media</label>
                    <div class="flex flex-wrap gap-4">
                        @foreach ($blog->media as $media)
                            <div class="relative w-32">
                                @if (Str::endsWith($media, ['.jpg', '.jpeg', '.png', '.gif']))
                                    <img src="{{ preg_replace('/^https?:/', '',asset('storage/' . $media)) }}" class="w-full h-24 object-cover rounded">
                                @elseif(Str::endsWith($media, ['.mp4', '.webm', '.mov']))
                                    <video src="{{ preg_replace('/^https?:/', '',asset('storage/' . $media)) }}" controls
                                        class="w-full h-24 rounded"></video>
                                @endif
                                {{-- Optionally add delete checkbox --}}
                                <div class="mt-1">
                                    <label class="text-white text-sm flex items-center gap-1">
                                        <input type="checkbox" name="remove_media[]" value="{{ $media }}">
                                        <span>Remove</span>
                                    </label>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif

            {{-- Upload Media --}}
            <div class="mb-4">
                <label class="block text-white mb-1">Upload New Media (image/video)</label>
                <input type="file" id="mediaInput" name="media[]" multiple accept="image/*,video/*"
                    class="text-white block w-full bg-[#0A0A0A] border border-[#EF4444] p-2 rounded">
            </div>

            {{-- Preview of New Media --}}
            <div id="previewContainer" class="flex flex-wrap gap-4 mb-6"></div>

            {{-- Submit --}}
            <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-lg transition">
                Update
            </button>
        </form>
    </div>

    <script>
        const mediaInput = document.getElementById('mediaInput');
        const previewContainer = document.getElementById('previewContainer');
        let dt = new DataTransfer();

        mediaInput.addEventListener('change', () => {
            for (const file of mediaInput.files) {
                dt.items.add(file);
            }
            mediaInput.files = dt.files;
            renderPreviews();
        });

        function renderPreviews() {
            previewContainer.innerHTML = '';

            [...mediaInput.files].forEach((file, index) => {
                const fileType = file.type;
                const reader = new FileReader();

                reader.onload = (e) => {
                    const wrapper = document.createElement('div');
                    wrapper.className = 'relative w-32';

                    const removeBtn = document.createElement('button');
                    removeBtn.innerHTML = '&times;';
                    removeBtn.type = 'button';
                    removeBtn.className =
                        'absolute -top-2 -right-2 bg-red-600 text-white rounded-full w-6 h-6 flex items-center justify-center';
                    removeBtn.onclick = () => {
                        dt.items.remove(index);
                        mediaInput.files = dt.files;
                        renderPreviews();
                    };

                    let preview;
                    if (fileType.startsWith('image')) {
                        preview = document.createElement('img');
                        preview.src = e.target.result;
                        preview.className = 'w-full h-24 object-cover rounded';
                    } else if (fileType.startsWith('video')) {
                        preview = document.createElement('video');
                        preview.src = e.target.result;
                        preview.controls = true;
                        preview.className = 'w-full h-24 rounded';
                    }

                    wrapper.appendChild(preview);
                    wrapper.appendChild(removeBtn);
                    previewContainer.appendChild(wrapper);
                };

                reader.readAsDataURL(file);
            });
        }
    </script>
@endsection
