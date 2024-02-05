<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Volunteer;
use Illuminate\Http\Request;

class VolunteerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['volunteers'] = Volunteer::all();
        return view('backend.volunteer.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.volunteer.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required',
                'email' => 'required',
                'phone' => 'required',
                'designation' => 'required',
                'description' => 'required',
                'img' => 'required|mimes:jpg,jpeg,png,svg|max:2048',

            ]);

            $volunteer = new Volunteer();
            $volunteer->name = $request->name;
            $volunteer->email = $request->email;
            $volunteer->phone = $request->phone;
            $volunteer->designation = $request->designation;
            $volunteer->description = $request->description;
            if ($request->hasFile('img')) {
                $file = $request->file('img');
                $file_name = time() . rand(0000, 9999) . $file->getClientOriginalName();
                $file->move('uploads/volunteer/', $file_name);
                $volunteer->img = 'uploads/volunteer/' . $file_name;
            }
            $volunteer->save();
            return redirect()->route('volunteer.index')
                ->with('success', 'Volunteer created successfully.');
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
        $data['volunteer'] = Volunteer::find($id);
        return view('backend.volunteer.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {

            $volunteer = Volunteer::find($id);
            $volunteer->name = $request->name;
            $volunteer->email = $request->email;
            $volunteer->phone = $request->phone;
            $volunteer->designation = $request->designation;
            $volunteer->description = $request->description;

            if ($request->hasFile('img')) {
                $file = $request->file('img');
                $file_name = time() . rand(0000, 9999) . $file->getClientOriginalName();
                $file->move('uploads/volunteer/', $file_name);
                if ($volunteer->img != null) {
                    unlink($volunteer->img);
                }
                $volunteer->img = 'uploads/volunteer/' . $file_name;
            }
            $volunteer->save();
            return redirect()->route('volunteer.index')
                ->with('success', 'Volunteer created successfully.');
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
            $volunteer = Volunteer::find($id);
            $volunteer->delete();
            return redirect()->route('volunteer.index')
                ->with('success', 'Volunteer deleted successfully');
        } catch (\Throwable $th) {
            return response()->json([
                'status' => 'error',
                'message' => $th->getMessage()
            ], 500);
        }
    }
}
