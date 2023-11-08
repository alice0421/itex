<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Thread extends Model
{
    use HasFactory;

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    // 親スレッドから複数の子スレッドを参照
    public function threads(): HasMany
    {
        return $this->hasMany(Thread::class, 'thread_id', 'id');
    }

    // 子スレッドから1つの親スレッドを参照
    public function root_thread(): BelongsTo
    {
        return $this->belongsTo(Thread::class, 'id', 'thread_id');
    }

    public function media(): BelongsToMany
    {
        return $this->belongsToMany(Media::class);
    }

    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class);
    }

    public function bookmark_users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'bookmarks', 'thread_id', 'user_id');
    }

    public function reactions(): HasMany
    {
        return $this->hasMany(Reaction::class);
    }

    public function reports(): HasMany
    {
        return $this->hasMany(Report::class);
    }
}
