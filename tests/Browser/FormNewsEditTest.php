<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class FormNewsEditTest extends DuskTestCase
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
                ->visit('/admin/news/1/edit')
                ->assertSeeIn('.card-title','Редактировать новость')
                ->resize(1920, 3000)
                ->press('Сохранить')
                ->assertSee('Новость успешно сохранена')
            ;
        });
    }
}
