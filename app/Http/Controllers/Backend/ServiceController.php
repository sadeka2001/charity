<?php

namespace App\Http\Controllers\Backend;

use App\Models\Service;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */

        public function index()
        {
            $data['services']=Service::latest()->get();
            return view('backend.service.index',$data);
        }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.service.create');
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
            $service = new Service();
            $service->title = $request->title;
            $service->goal = $request->goal;
            $service->description = $request->description;
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $file_name = time() . rand(0000, 9999) . $file->getClientOriginalName();
                $file->move('uploads/service/', $file_name);
                $service->image = 'uploads/service/' . $file_name;
            }
            $service->save();
            return redirect()->route('service.index')
                ->with('success', 'Service created successfully.');
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
        $data['service']=Service::find($id);
        return view('backend.service.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $service = Service::find($id);
            $service->title = $request->title;
            $service->goal = $request->goal;
            $service->description = $request->description;
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $file_name = time() . rand(0000, 9999) . $file->getClientOriginalName();
                $file->move('uploads/service/', $file_name);
                if ($service->image != null) {
                    unlink($service->image);
                }
                $service->image = 'uploads/service/' . $file_name;
            }
            $service->save();
            return redirect()->route('service.index')
                ->with('success', 'Service created successfully.');
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
        $service = Service::find($id);
        $service->delete();
        return redirect()->route('service.index')
            ->with('success', 'Reason deleted successfully');
    } catch (\Throwable $th) {
        return response()->json([
            'status' => 'error',
            'message' => $th->getMessage()
        ], 500);
    }
    }
}
