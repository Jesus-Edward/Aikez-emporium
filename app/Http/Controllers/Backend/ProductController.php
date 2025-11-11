<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\ProductDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductStoreRequest;
use App\Http\Requests\ProductUpdateRequest;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\Size;
use App\Traits\FileUploadTrait;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    use FileUploadTrait;

    /**
     * Display a listing of the resource.
     */
    public function index(ProductDataTable $dataTable)
    {
        return $dataTable->render('admin.product-mgt.product.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $brands = Brand::where('status', 1)->get();
        $sizes = Size::where('status', 1)->get();
        return view('admin.product-mgt.product.create', compact('brands', 'sizes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductStoreRequest $request)
    {

        $product = new Product();
        $product->name = $request->name;
        $product->slug = generateUniqueSlug('Product', $request->name);
        $product->price = $request->price;
        $product->texture = $request->texture;
        $product->color_family = $request->color_family;
        $product->quantity = $request->quantity;
        $product->size_id = $request->size;
        $product->sku = generateUniqueSKU($request->name, $request->size);
        $product->short_description = $request->short_description;
        $product->long_description = $request->long_description;
        $product->seo_title = $request->seo_title;
        $product->seo_description = $request->seo_description;
        // $product->category_id = $request->category;
        $product->brand_id = $request->brand;
        $product->status = $request->status;
        $product->image = $this->uploadImage($request, 'image', NULL, '/uploads/product-images');
        $product->image2 = !empty($request->image2) ? $this->uploadImage($request, 'image2', NULL, '/uploads/product-images') : null;
        $product->image3 = !empty($request->image3) ? $this->uploadImage($request, 'image3', NULL, '/uploads/product-images') : null;
        $product->image4 = !empty($request->image4) ? $this->uploadImage($request, 'image4', NULL, '/uploads/product-images') : null;

        $product->save();

        $notification = array(
            'message' => 'Product created successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('admin.product.index')->with($notification);
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
        $product = Product::findOrFail($id);
        $brands = Brand::where('status', 1)->get();
        $sizes = Size::where('status', 1)->get();
        return view('admin.product-mgt.product.edit', compact('product', 'brands', 'sizes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductUpdateRequest $request, string $id)
    {
        $product = Product::findOrFail($id);
        $imagePath = $this->uploadImage($request, 'image', $product->image, '/uploads/product-images');
        $imagePath2 = $this->uploadImage($request, 'image2', $product->image2, '/uploads/product-images');
        $imagePath3 = $this->uploadImage($request, 'image3', $product->image3, '/uploads/product-images');
        $imagePath4 = $this->uploadImage($request, 'image4', $product->image4, '/uploads/product-images');

        $product->update([
            'name' => $request->name,
            'price' => $request->price,
            'texture' => $request->texture,
            'color_family' => $request->color_family,
            'quantity' => $request->quantity,
            'size_id' => $request->size,
            'sku' => generateUniqueSKU($request->name, $request->size),
            'short_description' => $request->short_description,
            'long_description' => $request->long_description,
            'seo_title' => $request->seo_title,
            'seo_description' => $request->seo_description,
            // 'category_id' => $request->category,
            'brand_id' => $request->brand,
            'status' => $request->status,
            'image' => !empty($imagePath) ? $imagePath : $product->image,
            'image2' => !empty($imagePath2) ? $imagePath2 : $product->image2,
            'image3' => !empty($imagePath3) ? $imagePath3 : $product->image3,
            'image4' => !empty($imagePath4) ? $imagePath4 : $product->image4,
        ]);

        $notification = array(
            'message' => 'Product updated successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('admin.product.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $product = Product::findOrFail($id);
            $this->removeImage($product->image);
            if (!empty($product->image2)) {
                $this->removeImage($product->image2);
            }
            if (!empty($product->image3)) {
                $this->removeImage($product->image3);
            }
            if (!empty($product->image4)) {
                $this->removeImage($product->image4);
            }
            $table = '#product-table';
            $product->delete();
            return response()->json(['status' => 'success', 'message' => 'Product deleted successfully', 'table' => $table]);

        } catch (\Exception $e) {
            logger($e);
            return response()->json(['status' => 'error', 'message' => 'Something went wrong']);
        }

    }
}
