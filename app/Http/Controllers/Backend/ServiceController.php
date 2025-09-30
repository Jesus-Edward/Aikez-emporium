<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\ServiceDataTable;
use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(ServiceDataTable $dataTable)
    {
        return $dataTable->render('admin.service_.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.service_.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:1000',
            'button_link' => 'required|string|max:500',
            'status' => 'boolean|required',
            'icon' => 'required|string',
        ]);

        $service = new Service();
        $service->title = $request->title;
        $service->description = $request->description;
        $service->button_link = $request->button_link;
        $service->status = $request->status;
        $service->icon = $request->icon;
        $service->save();

        $notification = array(
            'message' => 'Service created successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('admin.service.index')->with($notification);
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
        $service = Service::findOrFail($id);
        return view('admin.service_.edit', compact('service'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:1000',
            'button_link' => 'required|string|max:500',
            'status' => 'boolean|required',
            'icon' => 'required|string',
        ]);

        $service = Service::findOrFail($id);
        $service->title = $request->title;
        $service->description = $request->description;
        $service->button_link = $request->button_link;
        $service->status = $request->status;
        $service->icon = $request->icon;
        $service->update();

        $notification = array(
            'message' => 'Service updated successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('admin.service.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $table = "#service-table";
            $about = Service::findOrFail($id);
            $about->delete();
            return response(['status' => 'success', 'message' => 'Service Deleted Successfully', 'table' => $table]);
        } catch (\Exception $e) {
            logger($e);
            return response(['status' => 'error', 'message' => 'Something went wrong']);
        }
    }
}
