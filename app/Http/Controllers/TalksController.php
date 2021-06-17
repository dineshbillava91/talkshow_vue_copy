<?php

namespace App\Http\Controllers;

use App\Talks;
use App\Speaker;
use App\Event;
use App\Participants;
use App\Tag;
use App\User;
use App\User_ratings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TalksController extends Controller
{
    public $home = "/talks";

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $speakers = Speaker::all();
        $tags = Tag::all();
        return view('talks.view', compact('speakers','tags'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $speakers = Speaker::all();
        $events = Event::all();
        $participants = User::where('role_id',2)->get();
        $tags = Tag::all();
        return view('talks.add', compact('speakers','events','participants','tags'));
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
            'name' => 'required|unique:talks',
            'title' => 'required|unique:talks',
            'description' => 'required',
            'speaker_id' => 'required',
            'event_id' => 'required',
            'participants' => 'required',
            'tags' => 'required'
        ]);

        $validatedData['participants'] = json_encode($request->participants);
        $validatedData['tags'] = json_encode($request->tags);
        $validatedData['users_id'] = Auth::id();

        Talks::create($validatedData);
        return redirect($this->home)->with('success', 'Talks Added Successfully !!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Talks  $talks
     * @return \Illuminate\Http\Response
     */
    public function show(Talks $talks)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Talks  $talks
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $talk = Talks::findOrFail($id);
        $speakers = Speaker::all();
        $events = Event::all();
        $participants = User::where('role_id',2)->get();
        $tags = Tag::all();

        return view('talks.edit', compact('talk','speakers','events','participants','tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Talks  $talks
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = request()->validate([
            'name' => 'required|unique:talks,name,'.$id,
            'title' => 'required|unique:talks,title,'.$id,
            'description' => 'required',
            'speaker_id' => 'required',
            'event_id' => 'required',
            'participants' => 'required',
            'tags' => 'required'
        ]);

        $validatedData['participants'] = json_encode($request->participants);
        $validatedData['tags'] = json_encode($request->tags);
        $validatedData['users_id'] = Auth::id();

        Talks::whereId($id)->update($validatedData);

        return redirect($this->home)->with('success', 'Talk Details Updated Successfully !!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Talks  $talks
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $talks = Talks::findOrFail($id);
        $talks->delete();

        return redirect($this->home)->with('success', 'Talk Deleted Successfully !!!');
    }

    /**
     * Search for specified resource from storage.
     *
     * @param  \App\Talks  $talks
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $query = Talks::with(['speaker','event','user_ratings']);
        
        $query->leftJoin('user_ratings', 'talks.id', '=', 'user_ratings.talk_id');
        $query->leftJoin('rating', 'rating.id', '=', 'user_ratings.rating_id');

        $query->when(request('speaker', false), function ($q, $speaker) { 
            return $q->where('speaker_id',$speaker);
        });

        $query->when(request('tag', false), function ($q, $tag) { 
            return $q->whereJsonContains('tags',(string)$tag);
        });

        $query->select('talks.*', DB::raw('AVG(rating.value) as rating'));
        $query->groupBy('talks.id');

        $talks = $query->get();
        $participants = User::where('role_id',2)->get();
        $tags = Tag::all();
        $speakers = Speaker::all();

        return response()->json(compact('talks','participants','tags','speakers'), 200);
    }
}
