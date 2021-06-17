<?php

namespace App\Http\Controllers;

use App\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{
    public $home = "/event";

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('event.view');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('event.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = request()->validate([
            'name' => 'required|unique:rating',
            'location' => 'required',
            'date' => 'required',
            'time' => 'required'
        ]);

        $validatedData['users_id'] = Auth::id();

        Event::create($validatedData);
        return redirect($this->home)->with('success', 'Event Created Successfully !!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $event = Event::findOrFail($id);

        return view('event.edit', compact('event'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = request()->validate([
            'name' => 'required|unique:rating',
            'location' => 'required',
            'date' => 'required',
            'time' => 'required'
        ]);

        $validatedData['users_id'] = Auth::id();

        Event::whereId($id)->update($validatedData);

        return redirect($this->home)->with('success', 'Event Details Updated Successfully !!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $event = Event::findOrFail($id);
        $event->delete();

        return redirect($this->home)->with('success', 'Event Deleted Successfully !!!');
    }

    /**
     * Load all events from database
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function load_events()
    {
        $events = Event::all();

        return response()->json($events, 200);
    }
}
