<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class DailyCurencyRates extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'currency-get-rates';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'get currency rates';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {


        $response = Http::get('https://kurs.resenje.org/api/v1/currencies/eur/rates/today');
        dd($response->json()['exchange_middle']);
    }
}
