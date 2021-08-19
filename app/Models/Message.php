<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Collection;

class Message extends Model
{
    use HasFactory;

    protected $table = "messages";

    protected $fillable = [
        'user_id',
        'content',
        'status_id',
        'status',
    ];

    /**
     * Обратная связь один к одному таблиц Messages and Users
     * @return BelongsTo
     */
    public function user(): belongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    /**
     * Обратная связь один к одному таблиц Messages and Costumers
     * @return hasMany
     */
    public function customers(): hasMany
    {
        return $this->hasMany(Customer::class, 'user_id', 'user_id');
    }
}
