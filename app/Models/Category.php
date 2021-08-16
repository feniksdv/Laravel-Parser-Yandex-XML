<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class Category extends Model
{
    use HasFactory;

    protected $table = "categories";

    protected array $allowedFields = [
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

    public function getCategories(): Collection
    {
        return \DB::table($this->table)->select($this->allowedFields)->get();

    }

    public function getCategoryById(int $id): object
    {
        return \DB::table($this->table)->select($this->allowedFields)->find($id);
    }


//    public function destroyCategoryById(int $id)
//    {
//        return \DB::table($this->table)->where('id','=', $id)->delete();
//    }
}
