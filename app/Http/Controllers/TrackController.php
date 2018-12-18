<?php

namespace App\Http\Controllers;
use App\Track;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TrackController extends Controller
{

    public function index($teacher_id)
    {
        $tracks=Track::AllStatementsInTrack($teacher_id); 
        //dd($tracks);       
        return view('track.index',['tracks'=>$tracks]);
    }
}
