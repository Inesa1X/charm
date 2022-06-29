<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Procedure extends Model
{
    use HasFactory;

    public function salons()
    {
        return $this->belongsToMany(Salon::class);
    }

    public function category() {
        return $this->belongsTo(Category::class);
    }
}
