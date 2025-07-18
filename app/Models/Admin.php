<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticatable
{
    use Notifiable;

    protected $fillable = ['username', 'password'];
    
    public function blogs()
    {
        return $this->hasMany(Blog::class);
    }
}

