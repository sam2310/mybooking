<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreRoomRequest;
use App\Room;
use Illuminate\Support\Facades\Redirect;

class RoomsController extends Controller
{
    /**
     * Display database
     */
    public function add()
    {
        return view('rooms.add');
    }
    /**
     * To insert to database
     */
    public function store(StoreRoomRequest $request)
    {
        // echo $request->get('name');
        // echo $request->name;
        //insert to database

        //method 1
        // $room= new Room();
        // $room->name = $request->name;
        // $room->description = $request->description;
        // $room->capacity = $request->capacity;
        // $room->status = $request->status;
        // $room->save();

        // method 2
        $room = Room::create($request->only('name','description','capacity','status'));

        dd($room);
        //redirect back to previous route
        // return back();

        // redirect to specific url
        // return Redirect('/rooms/add');

        // return to specific route name
        return redirect()->route('room:index')->with('alert','Your data has been saved! ');

    }

    public function index()
    {
        /**
         * Display form
         */
        // $rooms = Room::all();
        $rooms = Room::orderBy('name','ASC')->orderBy('created_at', 'Desc')->paginate(5);

        return view('rooms.index')->with(compact('rooms'));
    }


    public function delete(Room $room)
    {
        dd($room);
        $room->delete();

        return redirect()->route('room:index');
    }

    public function edit(Room $room)
    {
        // compact('room') ==['room' =>]$room]
        return view ('rooms.edit')->with(compact('room'));
    }

    public function update(StoreRoomRequest $request, Room $room)
    {

        $room->update($request->only('name','description','capacity','status'));
         dd($room);

        return redirect()->route('room:index');
    }

    public function search(Request $request)
    {
        $keyword = $request->get('keyword');
        //SELECT * FROM rooms WHERE name LIKE '%b%'
        $rooms=Room::where('name','LIKE','%'.$keyword.'%')->paginate(5);

        return view ('rooms.index')->with(compact('rooms'));
    }
}
