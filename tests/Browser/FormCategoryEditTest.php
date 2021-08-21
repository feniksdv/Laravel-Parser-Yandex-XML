<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class FormCategoryEditTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->browse(function (Browser $browser) {
            $browser
                ->visit('/admin/categories/1/edit')
                ->assertSeeIn('.card-title','Редактировать категорию')
                ->resize(1920, 3000)
                ->press('Сохранить')
                ->assertSee('Категория успешно сохранена')
            ;
        });
    }
}
