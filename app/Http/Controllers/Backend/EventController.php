<?php

namespace App\Http\Controllers\Backend;

use App\Models\Event;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Http\Controllers\Controller;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['events'] = Event::all();
        return view('backend.event.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.event.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'title' => 'required',
                'date' => 'required',
                'time'=> 'required',
                'address' => 'required',
                'description' => 'required',
                'image' => 'required|mimes:jpg,jpeg,png,svg|max:2048',

            ]);

            $event = new Event();
            $event->title = $request->title;
            $event->date = Carbon::parse($request->date)->format('Y-m-d');
            $event->time = Carbon::parse($request->time)->format('h:i:A');
            $event->address = $request->address;
            $event->description = $request->description;
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $file_name = time() . rand(0000, 9999) . $file->getClientOriginalName();
                $file->move('uploads/event/', $file_name);
                $event->image = 'uploads/event/' . $file_name;
            }
            $event->save();
            return redirect()->route('event.index')
                ->with('success', 'event created successfully.');
        }
        catch (\Throwable $th) {
            return response()->json([
                'status' => 'error',
                'message' => $th->getMessage()
            ], 500);
        }
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data['event'] = Event::find($id);
        return view('backend.event.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {

            $event = Event::find($id);
            $event->title = $request->title;
            $event->date = Carbon::parse($request->date)->format('Y-m-d');
            $event->time = Carbon::parse($request->time)->format('h:i:A');
            $event->address = $request->address;
            $event->description = $request->description;
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $file_name = time() . rand(0000, 9999) . $file->getClientOriginalName();
                $file->move('uploads/event/', $file_name);
                if ($event->image != null) {
                    unlink($event->image);
                }
                $event->image = 'uploads/event/' . $file_name;
            }
            $event->save();
            return redirect()->route('event.index')
                ->with('success', 'event created successfully.');
        }
        catch (\Throwable $th) {
            return response()->json([
                'status' => 'error',
                'message' => $th->getMessage()
            ], 500);
        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $event = Event::find($id);
            $event->delete();
            return redirect()->route('event.index')
                ->with('success', 'Event deleted successfully');
        }
        catch (\Throwable $th) {
            return response()->json([
                'status' => 'error',
                'message' => $th->getMessage()
            ], 500);
        }
    }
}
