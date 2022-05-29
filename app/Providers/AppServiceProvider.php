<?php

namespace App\Providers;

use App\Contracts\Parser;
use App\Contracts\SaveDataValueParser;
use App\Contracts\Social;
use App\Services\ParserService;
use App\Services\SaveInDbValueDataParserService;
use App\Services\SocialService;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(Social::class, SocialService::class);
        $this->app->bind(Parser::class, ParserService::class);
        $this->app->bind(SaveDataValueParser::class, SaveInDbValueDataParserService::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();
    }
}
