<?php

namespace App\Console\Commands;

use App\Models\ExcangeRates;
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
     * @return void
     */
    public function handle()
    {
        $currencies = ['USD', 'EUR', 'GBP', 'JPY'];

        $response = Http::get("https://kurs.resenje.org/api/v1/rates/today");
        $data = $response->json();
        $rateList = $data['rates'] ?? [];

        foreach ($currencies as $currency) {
            $rate = collect($rateList)->firstWhere('code', $currency);

            if ($rate && isset($rate['exchange_middle'])) {
                ExcangeRates::create([
                    'currency' => $currency,
                    'value' => $rate['exchange_middle'],
                ]);
            } else {
                $this->warn("Failed to fetch rate for $currency: " . ($rate['message'] ?? 'Unknown error'));
            }
        }
        }



}
