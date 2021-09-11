<?php
namespace App\Console\Commands;

use App\Jobs\ImportProducts;
use Exception;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Queue;

class ImportCommand extends Command
{
    protected $signature = 'import:products';

    protected $description = 'Import all data from "catalog.json"';

    public function handle(): void
    {
        try {
            $lines = file(__DIR__."/../../../catalog.json");

            foreach ($lines as $line) {
                $json = json_decode(
                    $line,
                    true,
                    512,
                    JSON_THROW_ON_ERROR
                );
               Queue::push(new ImportProducts($json));
            }
            $this->info("All products have been imported");
        } catch (Exception $e) {
            $this->error("An error occurred");
        }
    }
}