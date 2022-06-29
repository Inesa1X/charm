<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Salon;
use App\Models\Procedure;
use App\Models\Booking;
use App\Models\User;
use Illuminate\Http\Request;
use Auth;
use \Carbon\Carbon;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware(['auth', 'isMaster'])->except('create');
//        $this->middleware('checkrole');//->only('index');

    }

    public function index()
    {
        $bookings = Booking::all();
        return view('mybookings', ['bookings' => $bookings]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($salon_id, $procedure_id)
    {
        $salon = Salon::findOrFail($salon_id);
        $procedure = Procedure::findOrFail($procedure_id);
        return view('booking', compact('salon', 'procedure'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function book(Request $request)
    {

        $time =  Carbon::parse($request['date_time'])->format('H:i');
        $date = Carbon::parse($request['date_time'])->format('Y-m-d H:i:s');
        $master = json_decode($request->master);
        $request->validate([
            'master' => 'required',
        ]);


        $booking = new  Booking();
        $booking->city = $request['city'];
        $booking->salon = $request['salon'];
        $booking->salon_address = $request['salon_address'];
        $booking->category = $request['category'];
        $booking->procedure = $request['procedure'];
        $booking->master_id = $master !== 0 ? $master->id : 0;
        $booking->master_name = $master !== 0 ? $master->name : "ANY";
        $booking->master_email = $master !== 0 ? $master->email : "";
        $booking->master_avatar = $master !== 0 ? $master->avatar : "https://image.shutterstock.com/image-vector/unknown-male-silhouette-profile-avatar-260nw-1670055142.jpg";
        $booking->user = $request['user'];
        $booking->user_email = $request['user_email'];
        $booking->date = $date;
        $booking->date_type = "BOOKING";
        $booking->time = $time;
        $booking->price = (float)$request['price'];

        $booking->save();

        return \Redirect::back()->withErrors(['msg' => $master->name]);
    }

    public function calendar() {

//

//        current(array_filter($availabilityDates, function($item) {
//            print_r($item);
//        }));

//
        return view('master.calendar', ['availabilityDates' => $availabilityDates]);
    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroyBooking($id)
    {
        $booking = Booking::findOrFail($id);
        $booking->delete();
//        return redirect('/user/bookings');
        return back();
    }


}
