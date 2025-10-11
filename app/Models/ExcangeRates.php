<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static create(array $array)
 * @method static where(string $string, string $currency)
 */
class ExcangeRates extends Model
{
    const CURRENCY_EUR = "EUR";
    const CURRENCY_USD = "USD";
    const CURRENCY_GBP = "GBP";
    const CURRENCY_JPY = "JPY";
    const CURRENCY_CHF = "CHF";

    CONST AVAILABLE_CURRENCY = [
        self::CURRENCY_EUR,
        self::CURRENCY_USD,
        self::CURRENCY_GBP,
        self::CURRENCY_JPY,
        self::CURRENCY_CHF,
    ];


    protected $table = "excange_rates";


    protected $fillable = ["currency","value"];

    public static function getRates($currency)
    {
        return self::where('currency', $currency)
            ->whereDate('created_at', Carbon::now())
            ->first();
    }



}
