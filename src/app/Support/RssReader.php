<?php

namespace App\Support;

use Carbon\Carbon;
use Illuminate\Support\Collection;
use Orchestra\Parser\Xml\Document;
use Orchestra\Parser\Xml\Facade as XmlParser;

class RssReader
{
    protected ?Document $document = null;

    public function __construct(
        protected string $url,
    ) {
    }

    public static function make(string $url): static
    {
        return new static($url);
    }

    public function read(): static
    {

        if ($this->loaded()) {
            return $this;
        }


        $this->document = XmlParser::via(simplexml_load_string(file_get_contents($this->url, false)));

        //$this->document = Xml::load($this->url);

        return $this;
    }

    public function updated(): Carbon
    {
        $results = $this->document->parse([
            'updated' => ['uses' => 'updated'],
        ]);

        return Carbon::parse($results['updated']);
    }

    public function entries(): Collection
    {
        $entries = $this->document->parse([
            'entries' => ['uses' => 'channel.item[title,description,link]'],
        ]);
        //dd($entries);

        return collect($entries['entries'])->map(fn (array $entry) => new RssEntry(...[
            ...$entry,
        ]));
    }

    public function loaded(): bool
    {
        return $this->document !== null;
    }
}
