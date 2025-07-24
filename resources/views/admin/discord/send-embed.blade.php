@extends('layouts.admin')

@section('title', 'Send Embed to Discord')

@section('content')
    <div class="p-6 max-w-3xl mx-auto bg-[#0A0A0A] min-h-screen">

        <h1 class="text-2xl font-bold text-white mb-6">Send Embed to Discord</h1>

        @if (session('success'))
            <div class="mb-4 text-green-500">{{ session('success') }}</div>
        @endif

        @if (session('error'))
            <div class="mb-4 text-red-500">{{ session('error') }}</div>
        @endif

        <form action="{{ route('admin.discord.embed.store') }}" method="POST" class="space-y-4">
            @csrf

            <!-- Server -->
            <div>
                <label class="block text-white mb-1">Discord Server</label>
                <select id="server-select" class="w-full p-2 rounded bg-[#0A0A0A] text-white border border-[#EF4444]">
                    <option value="">-- Pilih Server --</option>
                    @foreach ($servers as $server)
                        <option value="{{ $server['id'] }}">{{ $server['name'] }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Channel -->
            <div>
                <label class="block text-white mb-1">Channel</label>
                <select name="channel_id" id="channel-select"
                    class="w-full p-2 rounded bg-[#0A0A0A] text-white border border-[#EF4444]" required>
                    <option value="">-- Pilih Channel --</option>
                </select>
            </div>


            <!-- Title -->
            <div>
                <label class="block text-white mb-1">Title</label>
                <input type="text" name="title" value="{{ old('title') }}"
                    class="w-full p-2 rounded bg-[#0A0A0A] text-white border border-[#EF4444]" required>
            </div>

            <!-- Description -->
            <div>
                <label class="block text-white mb-1">Description</label>
                <textarea name="description" rows="4" class="w-full p-2 rounded bg-[#0A0A0A] text-white border border-[#EF4444]"
                    required>{{ old('description') }}</textarea>
            </div>

            <!-- URL -->
            <div>
                <label class="block text-white mb-1">Link URL (opsional)</label>
                <input type="url" name="url" value="{{ old('url') }}"
                    class="w-full p-2 rounded bg-[#0A0A0A] text-white border border-[#EF4444]">
            </div>

            <!-- Image URL -->
            <div>
                <label class="block text-white mb-1">Image URL (opsional)</label>
                <input type="url" name="image_url" value="{{ old('image_url') }}"
                    class="w-full p-2 rounded bg-[#0A0A0A] text-white border border-[#EF4444]">
            </div>

            <!-- Submit -->
            <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-lg transition">
                Kirim Embed
            </button>
        </form>
    </div>
    <script>
        const serverSelect = document.getElementById('server-select');
        const channelSelect = document.getElementById('channel-select');

        serverSelect.addEventListener('change', function() {
            const serverId = this.value;
            channelSelect.innerHTML = '<option value="">-- Loading... --</option>';

            fetch(`https://holosimpgamers.my.id/u53k41-1d/get-channels/${serverId}`)
                .then(response => response.json())
                .then(data => {
                    channelSelect.innerHTML = '';
                    if (data.success) {
                        channelSelect.innerHTML = '<option value="">-- Pilih Channel --</option>';
                        data.channels.forEach(channel => {
                            const option = document.createElement('option');
                            option.value = channel.id.toString();
                            option.textContent = channel.name;
                            channelSelect.appendChild(option);
                        });
                    } else {
                        channelSelect.innerHTML = '<option value="">Gagal memuat channel</option>';
                    }
                })
                .catch(() => {
                    channelSelect.innerHTML = '<option value="">Gagal koneksi ke bot</option>';
                });
        });
    </script>

@endsection
