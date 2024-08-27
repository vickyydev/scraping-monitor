<?php

namespace App\Jobs;

use App\Models\Map;
use App\Models\Source;
use App\Services\ScrapingService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class ScrapeJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $map;
    protected $source;

    public function __construct(Map $map, Source $source)
    {
        $this->map = $map;
        $this->source = $source;
    }

    public function handle(ScrapingService $scrapingService): void
    {
        // Call the scrapMap in the service class
        \Log::info('ScrapeJob started for Source: ' . $this->source->id);
        $scrapingService->scrapMap($this->map, $this->source);
    }
}
