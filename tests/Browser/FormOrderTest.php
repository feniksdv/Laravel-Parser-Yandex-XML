<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class FormOrderTest extends DuskTestCase
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
            $browser->visit('/order')
                ->assertSee('Услуги')
                ->type('name', 'Антон')
                ->type('tel', '89990000000')
                ->type('email', 'feniksdv@gmail.com')
                ->type('massage', 'dusk test Order')
                ->pause(4000)
                ->resize(1920, 3000)
                ->press('Заказать')
                ->assertSee('Сообщение отправлено!');
        });
    }
}
