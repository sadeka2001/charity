<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['gallerys']=Gallery::get();
        return view('backend.gallery.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.gallery.create');
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
           
            $gallery = new Gallery();
            $gallery->title = $request->title;
            $gallery->description = $request->description;
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $file_name = time() . rand(0000, 9999) . $file->getClientOriginalName();
                $file->move('uploads/gallery/', $file_name);
                $gallery->image = 'uploads/gallery/' . $file_name;
            }
            $gallery->save();
            return redirect()->route('gallery.index')
                ->with('success', 'Gallery created successfully.');
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
        $data['gallery'] =Gallery::find($id);
        return view('backend.gallery.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try{
            $gallery = Gallery::find($id);
            $gallery->title = $request->title;
            $gallery->description = $request->description;
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $file_name = time().rand(0000,9999).$file->getClientOriginalName();
                $file->move('uploads/gallery/',$file_name);
                if ($gallery->image != null){
                    unlink($gallery->image);
                }
                $gallery->image = 'uploads/gallery/' . $file_name;
            }
            $gallery->save();
            return redirect()->route('gallery.index')
                ->with('success', 'Gallery created successfully.');
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
            $gallery = Gallery::find($id);
            $gallery->delete();
        }
        catch (\Throwable $th) {
            return response()->json([
                'status' => 'error',
                'message' => $th->getMessage()
            ], 500);
        }
       
    }
}
