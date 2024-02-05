<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\About;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['abouts']=About::all();
        return view('backend.about.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.about.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try{
            $request->validate([
                'title' => 'required',
                'description' => 'required',
                'image' => 'required|mimes:jpg,jpeg,png,svg|max:2048',
    
            ]);
           
            $about = new About();
            $about->title = $request->title;
            $about->description = $request->description;
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $file_name = time() . rand(0000, 9999) . $file->getClientOriginalName();
                $file->move('uploads/about/', $file_name);
                $about->image = 'uploads/about/' . $file_name;
            }
            $about->save();
            return redirect()->route('about.index')
                ->with('success', 'About created successfully.');
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
        $data['about'] =About::find($id);
        return view('backend.about.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,string $id)
    {
        try{
            $about = About::find($id);
            $about->title = $request->title;
            $about->description = $request->description;
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $file_name = time().rand(0000,9999).$file->getClientOriginalName();
                $file->move('uploads/about/',$file_name);
                if ($about->image != null){
                    unlink($about->image);
                }
                $about->image = 'uploads/about/' . $file_name;
            }
            $about->save();
            return redirect()->route('about.index')
                ->with('success', 'About created successfully.');
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
            $about =About::find($id);
            $about->delete();
            return redirect()->route('about.index')
                ->with('success', 'About deleted successfully');
        }
        catch (\Throwable $th) {
            return response()->json([
                'status' => 'error',
                'message' => $th->getMessage()
            ], 500);
        }
        
    }
}
