<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Certificate;
use Illuminate\Http\Request;

class CertifiedController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['certified'] = Certificate::all();
        return view('backend.certified.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.certified.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required',
                'designation' => 'required',
                'description' => 'required',
                'image' => 'required|mimes:jpg,jpeg,png,svg|max:2048',
           ]);

            $certified = new Certificate();
            $certified->name = $request->name;
            $certified->designation = $request->designation;
            $certified->description = $request->description;
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $file_name = time() . rand(0000, 9999) . $file->getClientOriginalName();
                $file->move('uploads/certified/', $file_name);
                $certified->image = 'uploads/certified/' . $file_name;
            }
            $certified->save();
            return redirect()->route('certified.index')
                ->with('success', 'certified created successfully.');
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
       $data['certified'] = Certificate::find($id);
       return view('backend.certified.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            
            $certified = Certificate::find($id);
            $certified->name = $request->name;
            $certified->designation = $request->designation;
            $certified->description = $request->description;
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $file_name = time() . rand(0000, 9999) . $file->getClientOriginalName();
                $file->move('uploads/certified/', $file_name);
                if ($certified->image != null) {
                    unlink($certified->image);
                }
                $certified->image = 'uploads/certified/' . $file_name;
            }
            $certified->save();
            return redirect()->route('certified.index')
                ->with('success', 'certified created successfully.');
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
        $certified = Certificate::find($id);
        $certified->delete();
        return redirect()->route('certified.index')
            ->with('success', 'certified deleted successfully');
    } catch (\Throwable $th) {
        return response()->json([
            'status' => 'error',
            'message' => $th->getMessage()
        ], 500);
    }
    }
}
