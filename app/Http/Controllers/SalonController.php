<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Salon;

class SalonController extends Controller
{
    public function show(Salon $salon)
    {
        return view('salon', ['salon'=>$salon]);
    }
}
