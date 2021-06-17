<?php

namespace App\Http\Controllers;

use App\Speaker;
use App\Talks;
use App\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        return view('speaker.top_speaker');
    }
    
    /**
     * Display a top speakers from datatbase.
     *
     * @return \Illuminate\Http\Response
     */
    public function top_speaker()
    {
        $search_type = request('search_type');

        if($search_type == 1){ 
            $query = Talks::with(['speaker']);
            $query->select('speaker_id',DB::raw('COUNT(speaker_id) as total_talks'));
            $query->groupBy('speaker_id');
            $query->orderBy('total_talks', 'DESC');
            $query->take('5');
        } else {
            $query = Talks::with(['speaker','user_ratings']);
            
            $query->join('user_ratings', 'talks.id', '=', 'user_ratings.talk_id');
            $query->join('rating', 'rating.id', '=', 'user_ratings.rating_id');

            $query->select('talks.name','speaker_id', DB::raw('AVG(rating.value) as rating'));
            $query->groupBy('talks.id');
            $query->orderBy('rating','desc');
            $query->take('5');
        }

        $talks = $query->get();

        return response()->json($talks, 200);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function sameday_talks()
    {
        return view('speaker.sameday_talks');
    }

    /**
     * Display a sameday talks from datatbase.
     *
     * @return \Illuminate\Http\Response
     */
    public function load_sameday_talks()
    {
        $query = Talks::with(['speaker']);
        $query->select('speaker_id',DB::raw('date(created_at) as date'),DB::raw('COUNT(DISTINCT event_id) as total_events'));
        $query->groupBy('speaker_id',DB::raw('date(created_at)'));
        $query->orderBy('total_events', 'DESC');

        $talks = $query->get();

        return response()->json($talks, 200);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function event_talks()
    {
        return view('event.search');
    }

    /**
     * Display total talks per event from datatbase.
     *
     * @return \Illuminate\Http\Response
     */
    public function load_event_talks()
    {
        $query = Talks::with(['event']);
        $query->select('talks.id','talks.event_id', DB::raw('COUNT(id) as total_talks'));
        $query->groupBy('event_id');
        $query->orderBy('total_talks', 'DESC');

        $talks = $query->get();

        return response()->json($talks, 200);
    }
}
