<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Status extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    /**
     * Обратная вязь таблиц Category and Status
     * @return BelongsTo
     */
    public function category(): belongsTo
    {
        return $this->belongsTo(Category::class, 'id', 'status_id');
    }

    /**
     * Обратная вязь таблиц News and Status
     * @return BelongsTo
     */
    public function news(): belongsTo
    {
        return $this->belongsTo(News::class, 'id', 'status_id');
    }

}
