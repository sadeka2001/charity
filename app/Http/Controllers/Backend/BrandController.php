<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['brands'] = Brand::latest()->get();
        return view('backend.brand.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.brand.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'link' => 'required',
                'logo' => 'required|mimes:jpg,jpeg,png,svg|max:2048',

            ]);
            $brand = new Brand();
            $brand->link = $request->link;
            if ($request->hasFile('logo')) {
                $file = $request->file('logo');
                $file_name = time() . rand(0000, 9999) . $file->getClientOriginalName();
                $file->move('uploads/brand/', $file_name);
                $brand->logo = 'uploads/brand/' . $file_name;
            }

            $brand->save();
            return redirect()->route('brand.index')
                ->with('success', 'brand created successfully.');
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
        $data['brand'] = Brand::find($id);
        return view('backend.brand.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
           
            $brand =Brand::find($id);
            $brand->link = $request->link;
            if ($request->hasFile('logo')) {
                $file = $request->file('logo');
                $file_name = time() . rand(0000, 9999) . $file->getClientOriginalName();
                $file->move('uploads/brand/', $file_name);
                if ($brand->logo != null) {
                    unlink($brand->logo);
                }
                $brand->logo = 'uploads/brand/' . $file_name;
            }

            $brand->save();
            return redirect()->route('brand.index')
                ->with('success', 'brand created successfully.');
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
            $brand = Brand::find($id);
            $brand->delete();
            return redirect()->route('brand.index')
                ->with('success', 'brand deleted successfully');
        } catch (\Throwable $th) {
            return response()->json([
                'status' => 'error',
                'message' => $th->getMessage()
            ], 500);
        }
    }
}
