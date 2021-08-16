<?php

namespace App\Models;

use DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class News extends Model
{
    use HasFactory;

    protected $table = "news";

    protected array $allowedFields = [
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

    public function getNews(): Collection
    {

        return DB::table($this->table)->select($this->allowedFields)->get();

    }

    public function getNewsById(int $id): object
    {
        return DB::table($this->table)->select($this->allowedFields)->find($id);
    }

    public function getNewsByIdCategory(int $id): object
    {
        return DB::table($this->table)
            ->select($this->allowedFields)
            ->where('category_id', '=', $id)
            ->get();
    }
}
