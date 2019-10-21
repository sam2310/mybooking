<?php

namespace App\Http\Controllers;
use App\Room;
use App\Booking;
Use Illuminate\Support\Carbon;

use Illuminate\Http\Request;

class BookingsController extends Controller
{

    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }
    /**
     * GET/bookings/add
     */
    public function add()
    {
        $rooms =Room::where('status',1)->orderBy('name')->get();

        return view('bookings.add')->with(compact('rooms'));
    }

    /**
     * POST/bookings/store
     */
    public function store(Request $request)
    {
        dd($request->all());
        $booking = new Booking;
        $booking->purpose = $request->purpose;

        //Convert start_date datetime format into mysql datetime format (Y-m-d H:i:s)
        $booking->start_date = Carbon::parse($request->start_date)->format('Y-m-d H:i:s');
        // $booking->start_date = $request->start_date->format('Y-m-d H:i:s');
        $add_hour=0;
        switch($request->type){
            case 'hour':
            $add_hour = $request->duration;
            break;
            case 'day':
            $add_hour = $request->duration * 24;
            break;
            case 'week':
            $add_hour = $request->duration * 24* 7;
            break;
        }

        //convert end date
        $booking->end_date = Carbon::parse($request->start_date)->addHour($add_hour);
        $booking->room()->associate($request->room_id);
        $booking->user()->associate(auth()->user()->id);
        $booking->save();

        return redirect()->route('booking:add')->with('alert','Your data has been saved! ');

    }

    public function index()
    {
        $bookings = Booking::orderBy('status','ASC')->orderBy('created_at', 'DESC')->paginate(5);

        return view('bookings.index')->with(compact('bookings'));
    }

    public function pending()
    {
        $bookings = Booking::where('status','pending')->orderBy('created_at', 'Desc')->paginate(5);

        return view('bookings.pending')->with(compact('bookings'));


    }

    public function approve(Booking $booking,$id)
    {
        $booking =Booking::find($id);
        $booking->update(['status'=> 'CONFIRMED']);
        // dd($booking);

        return redirect()->route('booking:index');
    }


    // public function reject(Booking $bookings)
    // {
    //     $bookings->update(['status'=> 'CANCELED']);

    //     return redirect()->route('bookings:pending');
    // }
}
