@extends('layouts.admin')

@section('title', 'Create Blog')

@section('content')
    <div class="p-6 max-w-3xl mx-auto bg-[#0A0A0A] min-h-screen">

        {{-- Tombol Back --}}
        <div class="mb-4">
            <a href="{{ url()->previous() }}"
                class="inline-block bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded transition">
                ← Back
            </a>
        </div>

        <h1 class="text-2xl font-bold text-white mb-6">Create Blog Post</h1>

        <form action="{{ route('admin.blog.store') }}" method="POST" enctype="multipart/form-data" id="blogForm">
            @csrf

            <!-- Title -->
            <div class="mb-4">
                <label class="block text-white mb-1">Title</label>
                <input type="text" name="title"
                    class="w-full p-2 rounded bg-[#0A0A0A] text-white border border-[#EF4444]" required>
            </div>

            <!-- Content -->
            <div class="mb-4">
                <label class="block text-white mb-1">Content</label>
                <textarea name="content" rows="6" class="w-full p-2 rounded bg-[#0A0A0A] text-white border border-[#EF4444]"
                    required></textarea>
            </div>

            <!-- Media Upload -->
            <div class="mb-4">
                <label class="block text-white mb-1">Upload Media (image/video)</label>
                <input type="file" name="media[]" id="mediaInput" multiple accept="image/*,video/*"
                    class="text-white block w-full bg-[#0A0A0A] border border-[#EF4444] p-2 rounded" />
                <input type="hidden" name="media_order" id="mediaOrder">
            </div>

            <!-- Preview -->
            <div id="previewContainer" class="flex flex-wrap gap-4 mb-6"></div>

            <!-- Submit -->
            <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-lg transition">
                Publish
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
