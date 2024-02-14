<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\RecentWork;
use Illuminate\Http\Request;

class RecentWorkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['recent_works'] = RecentWork::all();
        return view('backend.recentWork.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.recentWork.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'title' => 'required',
                // 'address' => 'nullable',
                'description' => 'required',
                'image' => 'required|mimes:jpg,jpeg,png,svg|max:2048',

            ]);

            $recent_work = new RecentWork();
            $recent_work->title = $request->title;
            $recent_work->address = $request->address;
            $recent_work->description = $request->description;
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $file_name = time() . rand(0000, 9999) . $file->getClientOriginalName();
                $file->move('uploads/recent_work/', $file_name);
                $recent_work->image = 'uploads/recent_work/' . $file_name;
            }
            $recent_work->save();
            return redirect()->route('recent_work.index')
                ->with('success', 'recent work created successfully.');
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
        $data['recent_work'] = RecentWork::find($id);
        return view('backend.recentWork.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {

            $recent_work = RecentWork::find($id);
            $recent_work->title = $request->title;
            $recent_work->address = $request->address;
            $recent_work->description = $request->description;
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $file_name = time() . rand(0000, 9999) . $file->getClientOriginalName();
                $file->move('uploads/recent_work/', $file_name);
                if ($recent_work->image != null) {
                    unlink($recent_work->image);
                }
                $recent_work->image = 'uploads/recent_work/' . $file_name;
            }
            $recent_work->save();
            return redirect()->route('recent_work.index')
                ->with('success', 'Recent work created successfully.');
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
            $recent_work = RecentWork::find($id);
            $recent_work->delete();
            return redirect()->route('recent_work.index')
                ->with('success', 'Recent Work deleted successfully');
        }
        catch (\Throwable $th) {
            return response()->json([
                'status' => 'error',
                'message' => $th->getMessage()
            ], 500);
        }
    }
}
