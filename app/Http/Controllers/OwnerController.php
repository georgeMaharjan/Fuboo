<?php

namespace App\Http\Controllers;

use App\Futsal;
use App\Futsal_images;
use App\TimeSlots;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

class OwnerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function bookingPage($id)
    {
        return view('owner.bookings');
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
        $futsal = Futsal::where('user_id',$id)->get();
        foreach ($futsal as $detail)
        {
            $timeSlots = TimeSlots::where('futsal_id',$detail->id)->get();
        }
        foreach ($futsal as $detail)
        {
            $images = Futsal_images::where('futsal_id',$detail->id)->get();
        }
//        return $images;
        return view('owner.ownerpage',compact('futsal','timeSlots','images'));

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
    public function futsalupdate(Request $request, $id)
    {

        $user_id = Auth::user()->id;

        $futsal = Futsal::find($id);
        $futsal->name = Input::get('name');
        $futsal->description = Input::get('description');
        $futsal->address = Input::get('address_line_1');
        $futsal->longitude = Input::get('longitude');
        $futsal->latitude = Input::get('latitude');
        $futsal->price = Input::get('price');
        $futsal->save();

        if ($request->hasFile('images')) {
            $images_array = $request->file('images');
            foreach ($images_array as $image)
            {
                $ext = $image->getClientOriginalExtension();
                $imageName = str_random(5) . '.' . $ext;
                $uploadPath = public_path('images/futsals/');
                $image->move($uploadPath, $imageName);
                $data['photo_path'] = "images/futsals/{$imageName}";


                $futsal_images = new Futsal_images;
                $futsal_images->image = $data['photo_path'];
                $futsal_images->futsal_id = Input::get('futsal_id');
                $futsal_images->save();
            }
        }

//        $futsal_images->save();
//        if ($request->hasFile('images')) {
//    foreach ($request->file('images') as $key => $images) {
//        $ext = $images->getClientOriginalExtension();
//        $imageName = str_random(5) . '.' . $ext;
//        $uploadPath = public_path('images');
//        $images->move($uploadPath, $imageName);
//        $data['photo_path'] = "images/{$imageName}";
//        $futsal_images->images = $data['photo_path'];
//    }
//}
        return redirect('owner/'.$user_id);
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

    public function addTimeSlot(Request $request)
    {
        $timeSlot = new TimeSlots();
        $from = Input::get('from');
        $to = Input::get('to');
        $slot = $from.'-'.$to;
        $timeSlot->futsal_id = Input::get('futsal_id');
        $timeSlot->date = Input::get('date');
        $timeSlot->slots = $slot;
        $timeSlot->price = Input::get('price');
        $timeSlot->save();
        return back();
    }
}
