<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Blog extends Model
{
    use HasFactory;

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
    ];

    protected $casts = [
        'media' => 'array',
        'posted_at' => 'datetime',
    ];

    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }
}
