<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class News extends Model
{
    use HasFactory;

    public static array $allowedFields = [
        'id',
        'category_id',
        'user_id',
        'title',
        'content',
        'image',
        'seo_title',
        'seo_description',
        'status_id',
        'created_at',
        'updated_at',
        'status',
        'deleted_at',
        ];

    protected $fillable = [
        'title',
        'content',
        'image',
        'seo_title',
        'seo_description',
        'status',
        'category_id',
        'user_id'
        ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    /**
     * Связь таблицы News and User
     * @return BelongsTo
     */
    public function users(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
