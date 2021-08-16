<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class Order extends Model
{
    use HasFactory;

    protected $table = "orders";

    protected array $allowedFields = [
        'orders.id',
        'orders.user_id',
        'orders.content',
        'orders.status_id',
        'orders.created_at',
        'orders.updated_at',
        'orders.status',
        'orders.deleted_at',
        'users.name',
        'users.email',
        'customers.tel',
        'customers.telegram',
    ];

    public function getOrders(): Collection
    {
        return \DB::table($this->table)->select($this->allowedFields)
            ->leftJoin('users', $this->table.'.user_id', '=', 'users.id')
            ->leftJoin('customers', $this->table.'.user_id', '=', 'customers.user_id')
            ->get();

    }

    public function getOrderById(int $id): object
    {
        return \DB::table($this->table)->select($this->allowedFields)->find($id);
    }
}
