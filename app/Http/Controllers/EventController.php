<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Events;

class EventController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('index');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('events.index')->with('events', Events::all());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('events.create_event');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'event_title'=>'required','string',
            'event_creator'=>'string',
            'event_content'=>'required',
            'event_date'=>'date',
            'event_state'=>['string','required','in:Finished,In Progress, Not Yet Started'],
            'image_event_path' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',



        ]);
        $event = new Events();
        $event->event_title = $request->input('event_title');
        $event->event_creator = $request->input('event_creator');
        $event->event_content = $request->input('event_content');
        $event->image_event_path = $request->input('image_event_path');
        $event->event_date = $request->input('event_date');
        $event->event_state = $request->input('event_state');
        $event->image_event_path = $request->file('image_event_path')->store('public/images');

        $event->save();
        return view('events.event_created');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $event = Events::findOrFail($id);
        return view('events.single_event', ['event'=>$event]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $event = Events::findOrFail($id);
        return view('events.edit',['event'=>$event]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $event = Events::findOrFail($id);

        $request->validate([
            'event_title'=>'required','string',
            'event_creator'=>'string',
            'event_content'=>'required',
            'event_date'=>'date',
            'event_state'=>['string','required','in:Finished,In Progress, Not Yet Started'],
            'image_event_path' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',



        ]);
        $event->event_title = $request->input('event_title');
        $event->event_creator = $request->input('event_creator');
        $event->event_content = $request->input('event_content');
        $event->image_event_path = $request->input('image_event_path');
        $event->event_date = $request->input('event_date');
        $event->event_state = $request->input('event_state');
        $event->image_event_path = $request->file('image_event_path')->store('public/images');

        $event->update();
        return view('events.event_updated');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $event = Events::findOrFail($id);
        $event->delete();
        return redirect()->route('show_events')->with('success', 'Event deleted succefully.');
    }
}
