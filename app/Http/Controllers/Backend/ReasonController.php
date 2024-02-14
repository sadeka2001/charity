<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use App\Models\Cause;
use Illuminate\Http\Request;

class ReasonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['causes']=Cause::latest()->get();
        return view('backend.cause.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.cause.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'title' => 'required',
                'goal' => 'required',
                'description' => 'required',
                'image' => 'required|mimes:jpg,jpeg,png,svg|max:2048',

            ]);
            $cause = new Cause();
            $cause->title = $request->title;
            $cause->goal = $request->goal;
            $cause->description = $request->description;
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $file_name = time() . rand(0000, 9999) . $file->getClientOriginalName();
                $file->move('uploads/cause/', $file_name);
                $cause->image = 'uploads/cause/' . $file_name;
            }
            $cause->save();
            return redirect()->route('cause.index')
                ->with('success', 'Reason created successfully.');
        } catch (\Throwable $th) {
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
        $data['cause']=Cause::find($id);
        return view('backend.cause.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $cause = Cause::find($id);
            $cause->title = $request->title;
            $cause->goal = $request->goal;
            $cause->description = $request->description;
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $file_name = time() . rand(0000, 9999) . $file->getClientOriginalName();
                $file->move('uploads/cause/', $file_name);
                if ($cause->image != null) {
                    unlink($cause->image);
                }
                $cause->image = 'uploads/cause/' . $file_name;
            }
            $cause->save();
            return redirect()->route('cause.index')
                ->with('success', 'Reason created successfully.');
        } catch (\Throwable $th) {
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
        $cause = Cause::find($id);
        $cause->delete();
        return redirect()->route('cause.index')
            ->with('success', 'Reason deleted successfully');
    } catch (\Throwable $th) {
        return response()->json([
            'status' => 'error',
            'message' => $th->getMessage()
        ], 500);
    }
    }
}
