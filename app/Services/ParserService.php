<?php


namespace App\Services;


use App\Contracts\Parser;
use App\Contracts\SaveDataValueParser;
use Orchestra\Parser\Xml\Facade as XmlParser;

class ParserService implements Parser
{
    public function getDate(string $url): void
    {
            $load = XmlParser::load($url);

            $data[] = $load->parse([
                'title' => [
                    'uses' => 'channel.title'
                ],
                'link' => [
                    'uses' => 'channel.link'
                ],
                'description' => [
                    'uses' => 'channel.description'
                ],
                'image' => [
                    'uses' => 'channel.image.url'
                ],
                'news' => [
                    'uses' => 'channel.item[title,link,guid,description,pubDate]'
                ]
            ]);

         app(SaveDataValueParser::class)->setTheParserValueToTheDB($data);
    }
}
