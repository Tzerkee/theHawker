<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::publish()->orderBy('event_date', 'DESC')->paginate(8);

        return view('events.index',compact('events'));
    }

    public function getContent($id)
    {
        $data = Event::publish()->orderBy('event_date', 'DESC')->paginate(8);
        $eventDetail = Event::publish()->where('id',$id)->first();

        return view('events.detail', compact('data', 'eventDetail'));
    }
}
