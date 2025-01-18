<?php

namespace App\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use App\Models\Product;
use Illuminate\Support\Facades\Log;

class IncreaseProductPrices implements ShouldQueue
{
    use Queueable;

    protected $percentage;

    /**
     * Create a new job instance.
     */
    public function __construct($percentage)
    {
        $this->percentage = $percentage;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        /**
         * Came across possible floating point imprecision issue during manual tests.
         * (a price increase of 10% on 62.05 (62.05*1.1=68.255) resulted in 68.25 after rounding instead of 68.26,
         * probably because it is stored as 6.254999... ?)
         */
        Product::query()->update([
            'price' => \DB::raw('ROUND(price * (1 + ' . ($this->percentage / 100) . '), 2)')
        ]);
    }
}
