<?php

namespace App\Console\Commands;

use App\Models\Import; 
use App\Models\Source;
use App\Models\Map;
use App\Jobs\ScrapeJob;
use Illuminate\Console\Command;

class QueueScrapeJobs extends Command
{
    protected $signature = 'scrape:queue';
    protected $description = 'Queue scraping jobs for all maps of active sources';

    public function handle(): void
    {
        $sources = Source::all();

        foreach ($sources as $source) {
            $maps = $source->maps;

            foreach ($maps as $map) {
                // Check if there is an unfinished import
                if (Import::where('source_id', $source->id)
                          ->where('map_id', $map->id)
                          ->whereNull('end_time')
                          ->exists()) {
                    \Log::info("AnotherProcessRunningException for Source ID: {$source->id}, Map ID: {$map->id}");
                    throw new \Exception("AnotherProcessRunningException");
                }

                // Dispatch the job 
                \Log::info('Dispatching ScrapeJob for Map: ' . $map->id . ' and Source: ' . $source->id);
                ScrapeJob::dispatch($map, $source);
            }
        }
    }
}
