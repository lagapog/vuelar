<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Trip extends Model
{
    protected $guarded = [];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function comments() {
        return $this->hasMany(Comment::class)->latest();
    }

    public function getImageAttribute($image) {
        if(!$image || starts_with($image, 'http')) {
            return $image;
        }

        return Storage::disk('public')->url($image);
    }
}
