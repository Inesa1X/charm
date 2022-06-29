<?php

namespace App\Http\Controllers;

use App\Models\Procedure;
use App\Models\Salon;
use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\Cast\Int_;
use function view;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.user.user', ['users' => User::paginate(10)]);
    }

    public function masters_customers($id) {
        return view('admin.user.user', ['users' => User::where('role_id', '=', $id)->paginate(10)]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.user.create', ['users' => User::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $proc = Procedure::findOrFail($id);
        return view('booking', ['proc' => $proc]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $roles = Role::all();
        $user = User::findOrFail($id);
        $salons = Salon::all();
        return view('admin.user.edit', ['user' => $user, 'salons' => $salons, 'roles' => $roles]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'password' => 'confirmed|min:6'
        ]);
//        dd($request->all());

        $user->salon_id = $request->salon_id;
        $user->update($request->all());

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::findOrFail($id)->delete();
        return back();
//        return redirect(route('admin.user'));
    }
}
