<?php


namespace App\Services;


use App\Contracts\Parser;
use App\Contracts\SaveDataValueParser;
use Orchestra\Parser\Xml\Facade as XmlParser;

class ParserService implements Parser
{
    public function getDate(array $urls): array
    {
        foreach ($urls as $url) {
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
        }
        return (app(SaveDataValueParser::class)->setTheParserValueToTheDB($data));
    }
}
