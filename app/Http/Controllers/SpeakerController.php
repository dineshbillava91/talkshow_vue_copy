<?php

namespace App\Http\Controllers;

use App\Speaker;
use Illuminate\Http\Request;

class SpeakerController extends Controller
{
    public $home = "/speaker";

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('speaker.view');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('speaker.add');
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
            'name' => 'required|unique:rating'
        ]);

        Speaker::create($validatedData);
        return redirect($this->home)->with('success', 'Speaker Added Successfully !!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Speaker  $speaker
     * @return \Illuminate\Http\Response
     */
    public function show(Speaker $speaker)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Speaker  $speaker
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $speaker = Speaker::findOrFail($id);

        return view('speaker.edit', compact('speaker'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Speaker  $speaker
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = request()->validate([
            'name' => 'required|unique:rating'
        ]);

        Speaker::whereId($id)->update($validatedData);

        return redirect($this->home)->with('success', 'Speaker Updated Successfully !!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Speaker  $speaker
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $speaker = Speaker::findOrFail($id);
        $speaker->delete();

        return redirect($this->home)->with('success', 'Speaker Deleted Successfully !!!');
    }

    /**
     * Load all speakers from database
     *
     * @param  \App\Speaker  $speaker
     * @return \Illuminate\Http\Response
     */
    public function load_speakers()
    {
        $speakers = Speaker::all();

        return response()->json($speakers, 200);
    }

    /**
     * Load top speakers from database
     *
     * @param  \App\Speaker  $speaker
     * @return \Illuminate\Http\Response
     */
    public function top()
    {
        $speakers = Speaker::all();

        return response()->json($speakers, 200);
    }
}
