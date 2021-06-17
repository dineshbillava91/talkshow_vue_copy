<?php

namespace App\Http\Controllers;

use App\Talks;
use App\Speaker;
use App\Event;
use App\Participants;
use App\Tag;
use App\User;
use App\Rating;
use App\User_ratings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ParticipantsController extends Controller
{
    public $home = "/participants";

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('participants.view');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('participants.add');
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
            'work_with' => 'required',
            'address' => 'required'
        ]);

        Participants::create($validatedData);
        return redirect($this->home)->with('success', 'Participant Added Successfully !!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Participants  $participants
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user_id = Auth::user()->id;

        $talk = Talks::with(['event'])->findOrFail($id);
        $participants = User::where('role_id',2)->get();
        $tags = Tag::all();
        $ratings = Rating::all();
        $user_rating = User_ratings::where('user_id',$user_id)->where('talk_id',$id)->get();

        $speaker_id = $talk->speaker_id;
        $recommended_talks = Talks::with(['event'])->where('speaker_id',$speaker_id)->whereJsonContains('participants',(string)$user_id)->where('id', '!=' , $id)->take(5)->get();

        return view('participants.show', compact('talk','participants','tags','ratings','user_rating','recommended_talks'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Participants  $participants
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $participant = Participants::findOrFail($id);

        return view('participants.edit', compact('participant'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Participants  $participants
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = request()->validate([
            'name' => 'required|unique:rating',
            'work_with' => 'required',
            'address' => 'required'
        ]);

        Participants::whereId($id)->update($validatedData);

        return redirect($this->home)->with('success', 'Participant Updated Successfully !!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Participants  $participants
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $participants = Participants::findOrFail($id);
        $participants->delete();

        return redirect($this->home)->with('success', 'Participant Deleted Successfully !!!');
    }

    /**
     * Load all participants from database
     *
     * @param  \App\Participants  $participants
     * @return \Illuminate\Http\Response
     */
    public function load_participant_talks()
    {
        $participant_id = (string)Auth::user()->id;
        $talks = Talks::with(['event'])->whereJsonContains('participants',$participant_id)->get();

        return response()->json($talks, 200);
    }

    /**
     * Add rating to talk
     *
     * @param  \App\Participants  $participants
     * @return \Illuminate\Http\Response
     */
    public function store_rating($id)
    {
        $validatedData = request()->validate([
            'rating_id' => 'required'
        ]);

        $validatedData['user_id'] = Auth::user()->id;
        $validatedData['talk_id'] = $id;

        User_ratings::create($validatedData);
        return redirect($this->home)->with('success', 'Rating Submitted Successfully !!!');
    }
}
