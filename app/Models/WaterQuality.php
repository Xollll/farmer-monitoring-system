<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WaterQuality extends Model
{
    protected $table = 'water_quality'; // Change this to the new table name
    use HasFactory;
}
