<?php

namespace App\Http\Controllers;

use App\Futsal;
use App\TimeSlots;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $type='admin';
        $admin=User::where('type', $type)
            ->get();
        return view('admin.adminpanel',compact('admin'));
    }

    public function futsalindex()
    {
        $futsals = Futsal::get();
        return view('admin.allfutsals', compact('futsals'));
    }

    public function storeTimeSlot(Request $request)
    {
        $slot = new TimeSlots();
        $slot->slots=Input::get('slot');
        $slot->save();
        return back();
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
        $admin=User::where('id',$id)
            ->get();
//        return $admin;
        return view('admin.adminpanel', compact('admin'));
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
    public function updateprofile(Request $request, $id)
    {
        $admin=User::find($id);
        $admin->name=Input::get('name');
        $admin->number=Input::get('number');
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $ext = $image->getClientOriginalExtension();
            $imageName = str_random(5) . '.' . $ext;
            $uploadPath = public_path('images/users');
            $image->move($uploadPath, $imageName);
            $data['photo_path'] = "images/users/{$imageName}";
            $admin->image = $data['photo_path'];
        }
        $admin->save();
        return redirect()->back();
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
