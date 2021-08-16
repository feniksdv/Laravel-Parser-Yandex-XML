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

    /**
     * Получить все новости
     *
     * @return Collection
     */
    public function getNews(): Collection
    {
        return DB::table($this->table)->select($this->allowedFields)->get();
    }

    /**
     * Получить новость по ID
     *
     * @param int $id
     * @return object
     */
    public function getNewsById(int $id): object
    {
        return DB::table($this->table)->select($this->allowedFields)->find($id);
    }

    /**
     * Получить список новостей по ID категории
     *
     * @param int $id
     * @return object
     */
    public function getNewsByIdCategory(int $id): object
    {
        return DB::table($this->table)
            ->select($this->allowedFields)
            ->where('category_id', '=', $id)
            ->get();
    }

    /**
     * Получить количество новостей по ID категории
     *
     * @return array
     */
    public function getCountNewsInCategories(): array
    {
        $objCategory = new Category();
        $countNewsInCategory = [];
        for ($i=0; $i <= count($objCategory->getCategories()); $i++) {
            $countNewsInCategory[] = \DB::table($this->table)
                ->where('category_id', '=', $i)
                ->count();
        }
        unset($countNewsInCategory[0]);

        return $countNewsInCategory;
    }
}
