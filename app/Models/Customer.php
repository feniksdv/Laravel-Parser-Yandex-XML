<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'is_admin',
        'is_author',
        'tel',
        'telegram',
    ];
    protected $casts = [
        'is_admin' => 'boolean'
    ];

    /**
     * Связь один к одному Costumer and User
     * @return belongsTo
     */
    public function user(): belongsTo
    {
        return $this->belongsTo(User::class, 'id', 'user_id');
    }

    /**
     * Связь один к одному Costumer and Messages
     * @return belongsTo
     */
    public function message(): belongsTo
    {
        return $this->belongsTo(Message::class, 'user_id', 'user_id');
    }
}
