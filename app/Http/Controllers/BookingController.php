<?php

namespace App\Http\Controllers;

use App\BookingSlots;
use App\TimeSlots;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        foreach ($request->timeslots as $index=>$timeslot) {
            $booking=new BookingSlots();
            $booking->time_slots_id=$timeslot;
            $booking->customer_id=Input::get('customer_id');
            $booking->payment='remaining';
            $booking->save();
//            $bookings = BookingSlots::create([
//                'time_slots_id'=>$timeslot,
//                'customer_id'=>$request->customer_id,
//                'payment'=>'remaining',
//            ]);
//            $timeslot=TimeSlots::find($timeslot);
//            $timeslot->status=Input::get('status');;
//            save($timeslot);
        }
        return redirect()->back();
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
    public function destroy($id)
    {
        //
    }
}
