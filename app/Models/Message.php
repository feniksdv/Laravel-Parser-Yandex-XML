<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class Message extends Model
{
    use HasFactory;

    protected $table = "messages";

    protected array $allowedFields = [
        'messages.id',
        'messages.user_id',
        'messages.content',
        'messages.status_id',
        'messages.created_at',
        'messages.updated_at',
        'messages.status',
        'messages.deleted_at',
        'users.name',
        'users.email',
        'customers.tel',
        'customers.telegram',
    ];

    public function getMessages(): Collection
    {
        return \DB::table($this->table)->select($this->allowedFields)
            ->leftJoin('users', $this->table.'.user_id', '=', 'users.id')
            ->leftJoin('customers', $this->table.'.user_id', '=', 'customers.user_id')
            ->get();
    }

    public function getMessageById(int $id): object
    {
        return \DB::table($this->table)->select($this->allowedFields)->find($id);
    }
}
