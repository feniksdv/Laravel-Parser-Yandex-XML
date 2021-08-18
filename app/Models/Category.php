<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use HasFactory;

    public static array $allowedFields = [
        'id',
        'title',
        'content',
        'image',
        'status_id',
        'seo_title',
        'seo_description',
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
    ];

    public function news(): HasMany
    {
        return $this->hasMany(News::class, 'category_id', 'id');
    }
}
