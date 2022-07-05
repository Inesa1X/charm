<?php

namespace App\Http\Controllers;

//use App\Models\Category;
use App\Models\Salon;
use App\Models\Procedure;
use App\Models\Booking;
//use App\Models\User;
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
        $this->middleware(['auth'])->only(['bookProcedure', 'index', 'calendar', 'saveDate','destroyBooking', 'destroySavedDate']);
        $this->middleware('isMaster')->except(['create', 'index', 'bookProcedure', 'destroyBooking']);
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
        return view('booking', ['salon' => $salon, 'procedure' => $procedure]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function bookProcedure(Request $request)
    {
        $time =  Carbon::parse($request['date_time'])->format('H:i');
        $date = Carbon::parse($request['date_time'])->format('Y-m-d H:i:s');
        $master = json_decode($request->master);
        $request->validate([
            'master' => 'required|not_in:0',
            'date_time' => 'required'
        ]);

        $booking = new Booking();
        $booking->city = $request['city'];
        $booking->salon = $request['salon'];
        $booking->salon_address = $request['salon_address'];
        $booking->category = $request['category'];
        $booking->procedure = $request['procedure'];
        $booking->master_id =  $master->id;
        $booking->master_name =  $master->name;
        $booking->master_email = $master->email;
        $booking->master_avatar = "";
        $booking->user = $request['user'];
        $booking->user_email = $request['user_email'];
        $booking->date = $date;
        $booking->date_type = "BOOKING";
        $booking->time = $time;
        $booking->price = (float)$request['price'];

        $booking->save();

        return \Redirect::back()->withErrors(['msg' => Carbon::parse($request['date_time'])->format('Y-m-d') .' '. $time]);
    }

    public function calendar() {
        $bookings = Booking::all()->where('date_type', '=', 'SCHEDULE')->where('master_id', '=', Auth::user()->id);
        $availabilityDates = array();
        foreach($bookings as $booking) {
            array_push($availabilityDates, Carbon::create($booking->date)->format("Y-m-d"));
        }
        return view('master.calendar', ['availabilityDates' => $availabilityDates]);
    }


    public function saveDate(Request $request) {

        $booking = new  Booking();
        $booking->date = $request->date;
        $booking->master_id = Auth::user()->id;
        $booking->date_type = "SCHEDULE";
        $booking->save();

        return back();
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
        return back();
    }

    public function destroySavedDate($date) {

        $savedDate = Booking::where('date_type','SCHEDULE')->where('date', $date)->where('master_id', Auth::user()->id);
        $savedDate->delete();
        return back();
    }

}
