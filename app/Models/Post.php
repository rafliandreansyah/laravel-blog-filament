<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Str;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'slug', 'body', 'thumbnail', 'active', 'user_id', 'published_at'];

    protected $casts = [
        'published_at' => 'datetime'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class);
    }

    public function shortBody()
    {
        return Str::words(strip_tags($this->body));
    }

    public function published()
    {
        return $this->published_at->format('F jS Y');
    }

    public function getThumbnails()
    {
        if (str_starts_with($this->thumbnail, 'http')) {
            return $this->thumbnail;
        } else {
            return '/storage' . $this->thumbnail;
        }
    }
}
