<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Article extends Model
{
    use HasFactory;

    protected $table = 'articles';

    protected $fillable = [
        'id', 'account_id', 'category_id', 'titile', 'content', 'photo'
    ];

    public $incrementing = false;
    protected $keyType = 'string';

    // Relasi ke Account
    public function user(): BelongsTo
    {
        return $this->belongsTo(Account::class, 'account_id', 'id');
    }

    // Relasi ke Category
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    // Relasi ke Comments
    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class, 'article_id', 'id');
    }

    // Relasi ke Likes
    public function likes(): HasMany
    {
        return $this->hasMany(Like::class, 'article_id', 'id');
    }
}