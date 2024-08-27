<?php

namespace App\Services;

use App\Models\Import;
use App\Models\Map;
use App\Models\Source;
use Symfony\Component\DomCrawler\Crawler;

class ScrapingService
{
    public function scrapMap(Map $map, Source $source): void
    {
        $import = Import::create([
            'map_id' => $map->id,
            'source_id' => $source->id,
            'start_time' => now(),
            'status' => 'running',
        ]);

        try {
            $crawler = new Crawler(file_get_contents($map->url));
            sleep(rand(1, 5)); // scrape time

            $articlesProcessed = rand(1, 10);

            $import->update([
                'status' => 'processed',
                'articles_processed' => $articlesProcessed,
                'end_time' => now(),
            ]);
        } catch (\Exception $e) {
            $import->update([
                'status' => 'error',
                'error_message' => $e->getMessage(),
                'end_time' => now(),
            ]);
        }
    }
}
