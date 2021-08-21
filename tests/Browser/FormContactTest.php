<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use Throwable;

class FormContactTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     * @throws Throwable
     */
    public function testExample(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/contact')
                    ->assertSee('Контакты')
                ->type('name', 'Антон')
                ->type('email', 'feniksdv@gmail.com')
                ->type('massage', 'dusk test Contact')
                ->pause(4000)
                ->resize(1920, 3000)
                ->press('Отправить')
                ->assertSee('Сообщение отправлено!');
        });
    }
}
