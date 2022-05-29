<?php

namespace App\Http\Controllers\Admin;

use App\Contracts\Parser;
use App\Http\Controllers\Controller;
use App\Jobs\NewsParsingJob;
use App\Models\News;
use App\Models\Resource;
use Illuminate\Http\Request;

class ParserController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param Request $request
     * @param Parser $parser
     * @return string
     */
    public function __invoke(Request $request, Parser $parser): string
    {
        $urls = Resource::get('url');

        foreach ($urls as $url) {
            NewsParsingJob::dispatch($url->url);
        }

        return ("Парсинг поставлен в очередь");

    }
}
