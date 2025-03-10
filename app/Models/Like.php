<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Like extends Model
{
    use HasFactory;

    protected $table = 'likes';

    protected $fillable = [
        'id', 'article_id', 'account_id'
    ];

    public $incrementing = false;
    protected $keyType = 'string';

    // Relasi ke Article
    public function article(): BelongsTo
    {
        return $this->belongsTo(Article::class, 'article_id', 'id');
    }

    // Relasi ke Account
    public function user(): BelongsTo
    {
        return $this->belongsTo(Account::class, 'account_id', 'id');
    }
}