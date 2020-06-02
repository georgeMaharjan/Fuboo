<?php

namespace App\Http\Controllers;

use App\Futsal;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $players = User::where('type', 'like', 'player')
                ->get();
        $owners = User::where('type', 'like', 'owner')
                ->get();
        return view('admin.users',compact('players','owners'));
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
        $futsal = new Futsal();
        $owner = new User();
        $owner->name = Input::get('name');
        $owner->email = Input::get('email');
        $owner->number = Input::get('number');
        $owner->password = bcrypt(Input::get('password'));
        $owner->type = Input::get('type');
        $owner->save();

        $futsal->name = Input::get('futsal' );
        $futsal->user_id = $owner->id;
        $futsal->status = 'open';

        $futsal->save();
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user=User::where('id',$id)
            ->get();
        return view('player.profile',compact('user'));
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
        $player=User::find($id);
        $player->name=Input::get('name');
        $player->number=Input::get('number');
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $ext = $image->getClientOriginalExtension();
            $imageName = str_random(5) . '.' . $ext;
            $uploadPath = public_path('images/users');
            $image->move($uploadPath, $imageName);
            $data['photo_path'] = "images/users/{$imageName}";
            $player->image = $data['photo_path'];
        }
        $player->save();
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
        //
    }
}
