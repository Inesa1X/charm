<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $casts = [

//        'date' => 'datetime:d-m-Y H:00',
    ];

//    public function users()
//    {
//        return $this->hasMany(User::class);
//    }
}
