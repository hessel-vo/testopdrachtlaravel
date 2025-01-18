<?php
//RapideTest

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Jobs\DecreaseProductPrices;

class PriceDecreaseCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'products:price-decrease {percentage}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Decrease product prices by a given percentage';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // Get the percentage argument from the command
        $percentage = $this->argument('percentage');

        DecreaseProductPrices::dispatch($percentage);

        $this->info("Job created: Product price decrease by {$percentage}%.");
    }
}