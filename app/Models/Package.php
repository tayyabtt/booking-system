<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
   protected $fillable = [
    'name', 'type', 'description', 'price', 'image',
    'hotel_name', 'start_date', 'end_date', 'duration',
];

}
