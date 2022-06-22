<?php

namespace App\Models;

use App\Support\RssEntry;
use App\Support\RssReader;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feed extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'last_processed_at' => 'datetime',
    ];

    public function entries()
    {
        return $this->hasMany(Entry::class);
    }

    public function process(): bool
    {
        $reader = RssReader::make($this->url)->read();
        $reader->entries()->each(function (RssEntry $entry) {
            $this->entries()->updateOrCreate([
                'link' => $entry->link,
            ], [
                'title' => $entry->title,
                'description' => $entry->description,
            ]);
        });

        return true;
    }
}
