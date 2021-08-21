<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class FormOrderEditTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     * @throws \Throwable
     */
    public function testExample()
    {
        $this->browse(function (Browser $browser) {
            $browser
                ->visit('/admin/order/1/edit')
                ->assertSeeIn('.card-title','Редактировать заказ')
                ->resize(1920, 3000)
                ->press('Сохранить')
                ->assertSee('Заказ успешно сохранен')
            ;
        });
    }
}
