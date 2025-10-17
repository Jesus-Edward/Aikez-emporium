<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\SizeDataTable;
use App\Http\Controllers\Controller;
use App\Models\Size;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SizeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(SizeDataTable $dataTable)
    {
        return $dataTable->render('admin.product-mgt.size.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.product-mgt.size.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:sizes,name',
            'status' => 'required|boolean|in:1,0'
        ]);

        $category = new Size();
        $category->name = $request->name;
        $category->status = $request->status;
        $category->save();

        $notification = array(
            'message' => 'Size created successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('admin.size.index')->with($notification);
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
        $size = Size::findOrFail($id);
        return view('admin.product-mgt.size.edit', compact('size'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $size = Size::findOrFail($id);
        $request->validate([
            'name' => 'required|string|max:255|unique:size,name,' . $size->id,
            'status' => 'required|boolean|in:1,0'
        ]);

        $size->name = $request->name;
        $size->status = $request->status;
        $size->update();

        $notification = array(
            'message' => 'Size updated successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('admin.category.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $size = Size::findOrFail($id);
            $size->delete();
            $table = '#size-table';

            return response()->json(['status' => 'success', 'message' => 'Size Deleted Successfully', 'table' => $table]);
        } catch (\Exception $e) {
            logger($e);
            return response(['status' => 'error', 'message' => 'Something went wrong']);
        }
    }
}
