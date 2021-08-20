<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Collection;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'content',
        'status_id',
        'status',
    ];

    /**
     * Обратная связь один к одному таблиц Order and Users
     * @return hasMany
     */
    public function users(): hasMany
    {
        return $this->hasMany(User::class, 'id', 'user_id');
    }

    /**
     * Обратная связь один к одному таблиц Order and Costumers
     * @return hasMany
     */
    public function customers(): hasMany
    {
        return $this->hasMany(Customer::class, 'user_id', 'user_id');
    }
}
