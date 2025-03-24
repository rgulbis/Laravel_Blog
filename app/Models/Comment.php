<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Comment extends Model
{
    protected $fillable = ["name", "comment", "post_id"];

    public function post(): BelongsTo
    {
        return $this->belongsTo(Post::class);
    }
}
