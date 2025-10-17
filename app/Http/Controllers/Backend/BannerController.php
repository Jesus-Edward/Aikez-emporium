<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\BannerDataTable;
use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Traits\FileUploadTrait;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    use FileUploadTrait;

    /**
     * Display a listing of the resource.
     */
    public function index(BannerDataTable $dataTable)
    {
        return $dataTable->render('admin.banner.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.banner.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'name' => 'nullable|string|max:255',
            'category' => 'nullable|string|max:255',
            'description' => 'required|string|max:1000',
            'button_link' => 'required|string|max:1000',
            'status' => 'boolean|required',
            'image' => 'required|image|mimes:jpg,png|max:5120',
        ]);

        $banner = new Banner();
        $imagePath = $this->uploadImage($request, 'image');
        $banner->title = $request->title;
        $banner->name = $request->name;
        $banner->category = $request->category;
        $banner->description = $request->description;
        $banner->button_link = $request->button_link;
        $banner->status = $request->status;
        $banner->image = $imagePath;
        $banner->save();

        $notification = array(
            'message' => 'Banner created successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('admin.banner.index')->with($notification);
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
        $banner =  Banner::findOrFail($id);
        return view('admin.banner.edit', compact('banner'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'name' => 'nullable|string|max:255',
            'category' => 'nullable|string|max:255',
            'description' => 'required|string|max:1000',
            'button_link' => 'required|string|max:1000',
            'status' => 'boolean|required',
            'image' => 'nullable|image|mimes:jpg,png|max:5120',
        ]);

        $banner = Banner::findOrFail($id);
        $imagePath = $this->uploadImage($request, 'image', $banner->image);
        $banner->title = $request->title;
        $banner->name = $request->name;
        $banner->category = $request->category;
        $banner->description = $request->description;
        $banner->button_link = $request->button_link;
        $banner->status = $request->status;
        $banner->image = !empty($imagePath) ? $imagePath : $banner->image;
        $banner->update();

        $notification = array(
            'message' => 'Banner updated successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('admin.banner.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $table = "#banner-table";
            $banner = Banner::findOrFail($id);
            $this->removeImage($banner->image);
            $banner->delete();
            return response(['status' => 'success', 'message' => 'About Deleted Successfully', 'table' => $table]);
        } catch (\Exception $e) {
            logger($e);
            return response(['status' => 'error', 'message' => 'Something went wrong']);
        }
    }
}
