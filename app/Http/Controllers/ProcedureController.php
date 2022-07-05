<?php

namespace App\Http\Controllers;

use App\Http\Middleware\RedirectIfAuthenticated;
use Illuminate\Http\Request;
use App\Models\Procedure;
use App\Models\Category;

class ProcedureController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'isAdmin'])->except('salons');
    }

    public function salons(Procedure $procedure)
    {
        return view('salons', ['procedure' => $procedure]);
    }

    public function procedures() {
        $categories = Category::all();
        return view('admin.procedure.index', ['categories' => $categories]);
    }

    public function editProcedure($id) {
        $procedure = Procedure::findOrFail($id);
        $categories = Category::all();
        return view('admin.procedure.edit', ['procedure' => $procedure, 'categories' => $categories]);
    }

    public function createProcedure() {
        $categories = Category::all();
        return view('admin.procedure.create', ['categories' => $categories]);
    }

    public function storeProcedure(Request $request) {
        $request->validate([
            'category_id' => 'required|not_in:0',
            'title' => 'required',
            'price' => 'required|numeric'
        ]);

        $procedure = New Procedure();
        $procedure->category_id = $request->category_id;
        $procedure->title = $request->title;
        $procedure->price = $request->price;
        $procedure->save();

        return back();
    }

    public function updateProcedure(Request $request, Procedure $procedure) {
        $procedure->update($request->all());
        return back();
    }

    public function destroyProcedure(Procedure $procedure) {
        $procedure->delete();
        return back();
    }
}
