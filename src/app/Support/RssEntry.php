<?php

namespace App\Support;

//use Carbon\Carbon;

class RssEntry
{
    public function __construct(
        public string $title,
        public string $description,
        public string $link,
    ) {
    }
}
