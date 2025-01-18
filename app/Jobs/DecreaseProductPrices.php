<?php
//RapideTest

namespace App\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use App\Models\Product;

class DecreaseProductPrices implements ShouldQueue
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
        Product::query()->update([
            'price' => \DB::raw('ROUND(price * (1 - ' . ($this->percentage / 100) . '), 2)')
        ]);
    }
}
