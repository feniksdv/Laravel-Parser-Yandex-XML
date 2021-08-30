<?php

namespace App\Http\Controllers\Admin;

use App\Contracts\Parser;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ParserController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param Request $request
     * @param Parser $parser
     * @return void
     */
    public function __invoke(Request $request, Parser $parser)
    {
        $urls = [
            "https://news.yandex.ru/music.rss",
            "https://news.yandex.ru/movies.rss",
        ];
        $parser->getDate($urls);
    }
}
