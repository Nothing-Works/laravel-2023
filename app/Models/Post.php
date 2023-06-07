<?php

namespace App\Models;

use Illuminate\Support\Facades\File;
use Spatie\YamlFrontMatter\YamlFrontMatter;
use function cache;
use function collect;
use function resource_path;

class Post
{
    public function __construct(public $title, public $excerpt, public $date, public $body, public $slug)
    {
    }

    public static function find($slug)
    {
        return static::all()->firstWhere('slug', $slug);
    }

    public static function all(): \Illuminate\Support\Collection
    {
        return cache()->rememberForever('posts.all', fn() => collect(File::files(resource_path("posts/")))
            ->map(fn($file) => YamlFrontMatter::parseFile($file))
            ->map(fn($document) => new Post(
                $document->title,
                $document->excerpt,
                $document->date,
                $document->body(),
                $document->slug
            ))->sortByDesc('date'));
    }
}
