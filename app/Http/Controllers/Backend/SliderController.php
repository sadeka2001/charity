<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['sliders'] = Slider::latest()->get();
        return view('backend.slider.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.slider.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'sub_title' => 'required',
            'photo' => 'required|mimes:jpg,jpeg,png,svg|max:2048',
        ]);

        $slider = new Slider();
        $slider->title = $request->title;
        $slider->sub_title = $request->sub_title;

        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $file_name = time() . rand(0000, 9999) . $file->getClientOriginalName();
            $file->move('uploads/slider/', $file_name);
            $slider->photo = 'uploads/slider/' . $file_name;
        }

        $slider->save();

        return redirect()->route('slider.index')
            ->with('success', 'Slider created successfully.');
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
        $slider = Slider::find($id);
        return view('backend.slider.edit', compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // $request->validate([
        //     'title' => 'required',
        //     'sub_title' => 'required',
        //     'photo' => 'required|mimes:jpg,jpeg,png,svg|max:2048',
        // ]);

        $slider = Slider::find($id);
        $slider->title = $request->title;
        $slider->sub_title = $request->sub_title;
        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $file_name = time().rand(0000,9999).$file->getClientOriginalName();
            $file->move('uploads/slider/',$file_name);
            if ($slider->photo != null){
                unlink($slider->photo);
            }
            $slider->photo = 'uploads/slider/' . $file_name;
        }

        $slider->save();
        return redirect()->route('slider.index')
            ->with('success', 'Slider updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $slider = Slider::find($id);
        $slider->delete();
        return redirect()->route('slider.index')
            ->with('success', 'slider deleted successfully');
    }
}
