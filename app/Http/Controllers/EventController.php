<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::all(); 
        return view('event', compact('events')); 
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required',
            'category' => 'required',
            'date_time' => 'required',
            'location' => 'required',
        ]);

        Event::create($data);
        return back()->with('success', 'Event added successfully!');
    }

    public function update(Request $request, $id)
    {
        $event = Event::findOrFail($id);
        $data = $request->validate([
            'title' => 'required',
            'category' => 'required',
            'date_time' => 'required',
            'location' => 'required',
        ]);

        $event->update($data);
        return back()->with('success', 'Event updated successfully!');
    }

    public function destroy($id)
    {
        $event = Event::findOrFail($id);
        $event->delete();
        return back()->with('success', 'Event deleted successfully!');
    }
}