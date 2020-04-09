<?php

namespace App\Http\Controllers;

use App\Futsal;
use App\Futsal_images;
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
    }

    public function bookingPage($id)
    {
        return view('owner.bookings');
    }

    public function stats()
    {
        return view('owner.stats');
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
        return view('owner.ownerpage', compact('futsal'));

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
        $futsal_images = Futsal_images::find($id);
        $futsal->name = Input::get('name');
        $futsal->description = Input::get('description');
        $futsal->address = Input::get('address_line_1');
        $futsal->longitude = Input::get('longitude');
        $futsal->latitude = Input::get('latitude');
        $futsal->price = Input::get('price');
        if ($request->hasFile('images')) {
            $images = $request->file('images');
            $ext = $images->getClientOriginalExtension();
            $imageName = str_random(5) . '.' . $ext;
            $uploadPath = public_path('images');
            $images->move($uploadPath, $imageName);
            $data['photo_path'] = "images/{$imageName}";
            $futsal->images = $data['photo_path'];
        }


        $futsal->save();
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
}
