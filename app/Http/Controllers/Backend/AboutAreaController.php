<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\AboutAreaDataTable;
use App\Http\Controllers\Controller;
use App\Models\AboutArea;
use App\Traits\FileUploadTrait;
use Illuminate\Http\Request;

class AboutAreaController extends Controller
{
    use FileUploadTrait;

    /**
     * Display a listing of the resource.
     */
    public function index(AboutAreaDataTable $dataTable)
    {
        return $dataTable->render('admin.about.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.about.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'about_title' => 'required|string|max:255',
            'about_description' => 'required|string|max:1000',
            'status' => 'boolean|required',
            'image' => 'required|image|mimes:jpg,png|max:5120',
        ]);

        $banner = new AboutArea();
        $imagePath = $this->uploadImage($request, 'image');
        $banner->about_title = $request->about_title;
        $banner->about_description = $request->about_description;
        $banner->status = $request->status;
        $banner->about_image = $imagePath;
        $banner->save();

        $notification = array(
            'message' => 'About created successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('admin.about.index')->with($notification);
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
        $about = AboutArea::findOrFail($id);
        return view('admin.about.edit', compact('about'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'about_title' => 'required|string|max:255',
            'about_description' => 'required|string|max:1000',
            'status' => 'boolean|required',
            'image' => 'nullable|image|mimes:jpg,png|max:5120',
        ]);

        $about = AboutArea::findOrFail($id);
        $imagePath = $this->uploadImage($request, 'image', $about->about_image);
        $about->about_title = $request->about_title;
        $about->about_description = $request->about_description;
        $about->status = $request->status;
        $about->about_image = !empty($imagePath) ? $imagePath : $about->about_image;
        $about->update();

        $notification = array(
            'message' => 'About updated successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('admin.about.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $table = "#aboutarea-table";
            $about = AboutArea::findOrFail($id);
            $this->removeImage($about->about_image);
            $about->delete();
            return response(['status' => 'success', 'message' => 'About Deleted Successfully', 'table' => $table]);
        } catch (\Exception $e) {
            logger($e);
            return response(['status' => 'error', 'message' => 'Something went wrong']);
        }
    }
}
