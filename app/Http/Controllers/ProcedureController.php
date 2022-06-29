<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Procedure;

class ProcedureController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);//->except('create');
        $this->middleware('isAdmin')->only('procedures');

    }

    public function salons(Procedure $procedure)
    {
        return view('salons', ['procedure'=>$procedure]);
    }

    public function procedures() {
        return view('admin.procedure.index');
    }
}
