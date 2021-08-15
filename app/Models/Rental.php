<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rental extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'scooter_id',
        'user_id',
        'rental_point_id',
        'reservation_time',
        'rental_status_id',
        'collateral_data',
        'cost',
        'manager_id'
    ];

}
