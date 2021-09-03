<?php


namespace App\Services;

use App\Contracts\SaveDataValueParser;
use App\Models\Category;
use App\Models\News;

class SaveInDbValueDataParserService implements SaveDataValueParser
{
    public function setTheParserValueToTheDB(array $data): void
    {
        //1. Если нет категории то создать её
        $categoriesTitleAll = Category::all('id','title')->toArray();

        $categories=[];
        foreach ($data as $datum) {
            $categories[] = [
                'title' => str_replace('Яндекс.Новости: ', '', $datum['title']),
                'content' => $datum['description'],
            ];
        }
        $aTmp1=[];
        $aTmp2=[];
        foreach($categoriesTitleAll as $aV){
            $aTmp1[] = $aV['title'];
        }
        foreach($categories as $aV){
            $aTmp2[] = $aV['title'];
        }
        $diff_categories = array_diff($aTmp2,$aTmp1);

        if($diff_categories) {
            foreach ($categories as $category) {
                Category::create([
                    'title' => $category['title'],
                    'content' => $category['content'],
                    'status_id' => 3,
                    'seo_title' => $category['title'],
                    'seo_description' => $category['content'],
                ]);
            }
        }

        //2. Сохранить саму новость
        $newsTitleAll = News::all('id','title')->toArray();
        $news = [];
        foreach ($categoriesTitleAll as $categoriesTitleID) {
            foreach ($data as $oNews) {
                foreach ($oNews['news'] as $oNews_) {
                    if(str_replace('Яндекс.Новости: ', '', $oNews['title']) === $categoriesTitleID['title']) {
                        $news[] = [
                            'category' => $categoriesTitleID['id'],
                            'user_id' => 1,
                            'title' => $oNews_['title'],
                            'content' => $oNews['description'],
                            'seo_title' => $oNews_['title'],
                            'seo_description' => $oNews['description'],
                            'status_id' => 3,
                        ];
                    }
                }
            }
        }
        $aTmp11=[];
        $aTmp22=[];
        foreach($newsTitleAll as $aV) {
            $aTmp11[] = $aV['title'];
        }
        foreach($news as $aV){
            $aTmp22[] = $aV['title'];
        }
        $diff_news = array_diff($aTmp22,$aTmp11);

        //определить категорию
        if($diff_news) {
            foreach ($news as $oNews) {
                News::create([
                    'category_id' => $oNews['category'],
                    'user_id' => $oNews['user_id'],
                    'title' => $oNews['title'],
                    'content' => $oNews['content'],
                    'seo_title' => $oNews['seo_title'],
                    'seo_description' => $oNews['seo_description'],
                    'status_id' => $oNews['status_id'],
                ]);
            }
        }
    }
}
