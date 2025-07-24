<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class DiscordEmbedController extends Controller
{

    public function create()
    {
        $servers = [];

        try {
            $response = Http::get('https://bot.holosimpgamers.my.id/check-servers');
            if ($response->successful()) {
                $servers = $response->json()['servers'];
            }
        } catch (\Exception $e) {
            // Optional: Tambahkan log jika perlu
        }

        return view('admin.discord.send-embed', compact('servers'));
    }

    public function getChannels($serverId)
    {
        $response = Http::get("https://bot.holosimpgamers.my.id/get-channels/{$serverId}");

        if ($response->successful()) {
            return response()->json([
                'success' => true,
                'channels' => $response->json()['channels']
            ]);
        }

        return response()->json([
            'success' => false,
            'message' => 'Gagal mengambil channel'
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'channel_id' => 'required|string',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'url' => 'nullable|url',
            'image_url' => 'nullable|url',
        ]);

        $response = Http::post('https://bot.holosimpgamers.my.id/send-embed', [
            'channel_id' => (string) $request->channel_id, 
            'title' => $request->title,
            'description' => $request->description,
            'url' => $request->url,
            'image_url' => $request->image_url,
        ]);

        if ($response->successful()) {
            return back()->with('success', 'Embed berhasil dikirim ke Discord!');
        }

        return back()->with('error', 'Gagal mengirim embed: ' . $response->body());
    }
}
