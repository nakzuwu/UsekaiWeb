<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;
use Spatie\Feed\Feedable;
use Spatie\Feed\FeedItem;

class Blog extends Model implements Feedable
{
    use HasFactory;

    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'title',
        'content',
        'media',
        'admin_id',
        'posted_at',
        'link_url',
        'link_title',
        'link_description',
        'link_image',
        'link_provider',
        'slug',
    ];

    protected $casts = [
        'media' => 'array',
        'posted_at' => 'datetime',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (empty($model->id)) {
                $model->id = (string) \Illuminate\Support\Str::uuid();
            }
        });
    }

    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }

    public function toFeedItem(): \Spatie\Feed\FeedItem
    {
        $mediaUrl = is_array($this->media) ? ($this->media[0] ?? null) : $this->media;
        $imageHtml = $mediaUrl ? '<img src="' . url($mediaUrl) . '" style="max-width:100%;"><br>' : '';

        return FeedItem::create([
            'id' => $this->id,
            'title' => $this->title ?? 'Tanpa Judul',
            'summary' => $imageHtml . Str::limit(strip_tags($this->content), 150),
            'updated' => $this->updated_at ?? $this->created_at,
            'link' => url("/blog/" . ($this->slug ?? $this->id)),
            'authorName' => 'Admin',
        ]);
    }

    public static function getFeedItems()
    {
        return self::whereNotNull('posted_at')
            ->orderBy('posted_at', 'desc')
            ->take(20)
            ->get();
    }
}
