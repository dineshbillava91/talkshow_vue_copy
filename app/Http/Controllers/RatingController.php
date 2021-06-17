<?php

namespace App\Http\Controllers;

use App\User;
use App\Rating;
use Illuminate\Http\Request;

class RatingController extends Controller
{
    public $home = "/rating";

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        return view('rating.view');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('rating.add');
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
            'value' => 'required'
        ]);

        Rating::create($validatedData);
        return redirect($this->home)->with('success', 'Rating Added Successfully !!!');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Rating  $rating
     * @return \Illuminate\Http\Response
     */
    public function show(Rating $rating)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Rating  $rating
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $rating = Rating::findOrFail($id);

        return view('rating.edit', compact('rating'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Rating  $rating
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = request()->validate([
            'name' => 'required|unique:rating',
            'value' => 'required'
        ]);

        Rating::whereId($id)->update($validatedData);

        return redirect($this->home)->with('success', 'Rating Updated Successfully !!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Rating  $rating
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $rating = Rating::findOrFail($id);
        $rating->delete();

        return redirect($this->home)->with('success', 'Rating Deleted Successfully !!!');
    }

    /**
     * Load all ratings from database
     *
     * @param  \App\Rating  $rating
     * @return \Illuminate\Http\Response
     */
    public function load_rating()
    {
        $ratings = Rating::all();

        return response()->json($ratings, 200);
    }
}
