<?php
//RapideTest

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Jobs\IncreaseProductPrices;

class PriceIncreaseCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'products:price-increase {percentage}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Increase product prices by a given percentage';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // Get the percentage argument from the command
        $percentage = $this->argument('percentage');

        IncreaseProductPrices::dispatch($percentage);

        $this->info("Job creaed: Product price increase by {$percentage}%.");
    }
}