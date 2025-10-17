<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\TestimonialDataTable;
use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use App\Traits\FileUploadTrait;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    use FileUploadTrait;

    /**
     * Display a listing of the resource.
     */
    public function index(TestimonialDataTable $dataTable)
    {
        return $dataTable->render('admin.testimonial.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.testimonial.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'testimony' => 'required|string|max:1000',
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg,wepg',
            'status' => 'required|boolean|in:1,0'
        ]);

        $testimonial = new Testimonial();
        $imagePath = $this->uploadImage($request, 'image');
        $testimonial->name = $request->name;
        $testimonial->location = $request->location;
        $testimonial->testimony = $request->testimony;
        $testimonial->image = $imagePath;
        $testimonial->status = $request->status;
        $testimonial->save();

        $notification = array(
            'message' => 'Testimonial created successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('admin.testimonial.index')->with($notification);
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
        $testimonial = Testimonial::findOrFail($id);
        return view('admin.testimonial.edit', compact('testimonial'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'testimony' => 'required|string|max:1000',
            'image' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg,wepg',
            'status' => 'required|boolean|in:1,0'
        ]);

        $testimonial = Testimonial::findOrFail($id);
        $imagePath = $this->uploadImage($request, 'image', $testimonial->image);
        $testimonial->name = $request->name;
        $testimonial->location = $request->location;
        $testimonial->testimony = $request->testimony;
        $testimonial->image = !empty($imagePath) ? $imagePath : $testimonial->image;
        $testimonial->status = $request->status;
        $testimonial->update();

        $notification = array(
            'message' => 'Testimonial updated successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('admin.testimonial.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $testimonial = Testimonial::findOrFail($id);
            $this->removeImage($testimonial->image);
            $testimonial->delete();
            $table = '#testimonial-table';

            return response(['status' => 'success', 'message' => 'Testimonial deleted successfully', 'table' => $table]);
        } catch (\Exception $e) {
            logger($e);
            return response(['status' => 'error', 'message' => 'Something went wrong']);
        }
    }
}
