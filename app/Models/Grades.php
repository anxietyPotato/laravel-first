<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static create(array $validated)
 */
class Grades extends Model
{
    protected $table = "grades";
    protected $fillable = ["Class","Grade","Profesor","user_id"];

}
