<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Support\RssReader;
use Orchestra\Parser\Xml\Facade as XmlParser;

class RssReaderTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testRssReader()
    {
        $content = '<api>
        <collection>
                <user>
                    <id>1</id>
                    <name>Mior Muhammad Zaki</name>
                </user>
                <user>
                    <id>2</id>
                    <name>Taylor Otwell</name>
                </user>
            </collection>
        </api>';

        $schema = [
            'users' => ['uses' => 'channel.item[title,name]'],
        ];

        $document = XmlParser::via(simplexml_load_string(file_get_contents('https://lifehacker.com/rss', false)));

        $data = $document->parse($schema);

        dd($data);
        //$entry = RssReader::make(simplexml_load_string($xmlString))->read();
        //$this->assertIsInt($entry);
    }
}
