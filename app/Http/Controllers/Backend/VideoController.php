<?php

namespace App\Http\Controllers\Backend;

use App\Models\Video;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['videos'] = Video::all();
        return view('backend.video.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.video.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try{
            $request->validate([
                'title' => 'nullable',
                'description' => 'nullable',
                'link'=>'nullable',
                'goal'=>'nullable',
            ]);

            $video = new Video();
            $video->title = $request->title;
            $video->goal = $request->goal;
            $video->link = $request->link;
            $video->description = $request->description;

            $video->save();
            return redirect()->route('video.index')
                ->with('success', 'video created successfully.');
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
        $data['video'] = Video::find($id);
        return view('backend.video.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try{
            $video = Video::find($id);
            $$video->title = $request->title;
            $video->goal = $request->goal;
            $video->link = $request->link;
            $video->description = $request->description;

            $video->save();
            return redirect()->route('video.index')
                ->with('success', 'Video Updated successfully.');
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
        try{
            $video = Video::find($id);
            $video->delete();
        }
        catch (\Throwable $th) {
            return response()->json([
                'status' => 'error',
                'message' => $th->getMessage()
            ], 500);
        }
    }
}
