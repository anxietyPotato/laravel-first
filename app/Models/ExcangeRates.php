<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static create(array $array)
 */
class ExcangeRates extends Model
{
    protected $table = "excange_rates";
    protected $fillable = ["currency","value"];



}
