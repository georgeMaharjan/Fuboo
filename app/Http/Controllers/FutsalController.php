<?php

namespace App\Http\Controllers;

use App\Futsal;
use App\Futsal_images;
use App\TimeSlots;
use App\User;
use Illuminate\Http\Request;

class FutsalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $futsals = Futsal::get();
        $timeslots=TimeSlots::get();
        return view('futsals.futsals',compact('futsals','timeslots'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function search(Request $request)
    {
        $search=$request->input('query');
        $results = Futsal::where('address', 'LIKE', "%{$search}%")
            ->orwhere('name', 'like', "%{$search}%")
            ->get();
        return view('results',compact('results'));
    }

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
        //
    }

    /**
     * Display the specified resource
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($name)
    {
        $futsal = Futsal::where('name',$name)->get();
        foreach ($futsal as $detail)
        {
            $timeslots = TimeSlots::where('futsal_id',$detail->id)
                ->get();
        }
        foreach ($futsal as $detail)
        {
            $images = Futsal_images::where('futsal_id',$detail->id)->get();
        }
        return view('futsals.futsaldetails',compact('futsal', 'timeslots','images'));
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
