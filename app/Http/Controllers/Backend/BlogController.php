<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\BlogStoreRequest;
use App\Models\BlogCategory;
use App\Models\BlogPost;
use App\Traits\FileUploadTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;


class BlogController extends Controller
{
    use FileUploadTrait;

    public function CategoryIndex()
    {
        $categories = BlogCategory::latest()->get();
        return view('admin.blog.blog_category.index', compact('categories'));
    }

    public function storeCategory(Request $request)
    {
        $request->validate([
            'category' => "required|string|max:255|unique:blog_categories,category",
            'status' => "required|boolean"
        ]);

        $category = new BlogCategory();
        $category->category = $request->category;
        $category->status = $request->status;
        $category->slug = Str::slug($request->category);
        $category->save();

        toastr()->success('Blog Category created successfully');
        return redirect()->back();
    }

    public function CategoryEdit($id)
    {
        $category = BlogCategory::findOrFail($id);
        return response()->json($category);
    }

    public function updateCategory(Request $request)
    {

        $cat_id = $request->cat_id;
        $request->validate([
            'category' => "required|string|max:255|unique:blog_categories,category," . $cat_id,
            'status' => "required|boolean"
        ]);

        $category = BlogCategory::findOrFail($cat_id);
        $category->category = $request->category;
        $category->status = $request->status;
        $category->slug = Str::slug($request->category);
        $category->update();

        toastr()->success('Blog Category updated successfully');
        return redirect()->back();
    }

    public function deleteCategory($id)
    {
        try {
            $category = BlogCategory::findOrFail($id);
            $category->delete();
            toastr()->success('Blog Category deleted successfully');
            return response(['status' => 'success']);
        } catch (\Exception $e) {
            logger($e);
            return response(['status' => 'error']);
        }
    } // Blog category Ends

    public function index()
    {
        $blogs = BlogPost::latest()->get();
        return view('admin.blog.index', compact('blogs'));
    }

    public function create()
    {
        $categories = BlogCategory::all();
        return view('admin.blog.create', compact('categories'));
    }

    public function store(BlogStoreRequest $request)
    {
        $imagePath = $this->uploadImage($request, 'image');
        $blog = new BlogPost();
        $blog->category_id = $request->category;
        $blog->user_id = Auth::user()->id;
        $blog->status = $request->status;
        $blog->title = $request->title;
        $blog->slug = Str::slug($request->title);
        $blog->short_post = $request->short_post;
        $blog->post = $request->post;
        $blog->image = $imagePath;

        $blog->save();
        $notification = array('message' => 'Blog created successfully', 'alert-type' => 'success');
        return to_route('admin.blog.post.index')->with($notification);
    }

    public function edit($id)
    {
        $categories = BlogCategory::all();
        $blog = BlogPost::findOrFail($id);
        return view('admin.blog.edit', compact('blog', 'categories'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'category' => 'required|integer',
            'status' => 'required|boolean',
            'image' => 'nullable|image|max:5048|mimes:png,jpeg,jpg,gif,heic',
            'title' => 'required|string|max:255|unique:blog_posts,title,' . $id,
            'short_post' => 'required|string|max:500',
            'post' => 'nullable'
        ]);

        $blog = BlogPost::findOrFail($id);
        $imagePath = $this->uploadImage($request, 'image', $blog->image);
        $blog->category_id = $request->category;
        $blog->user_id = Auth::user()->id;
        $blog->status = $request->status;
        $blog->title = $request->title;
        $blog->slug = Str::slug($request->title);
        $blog->short_post = $request->short_post;
        $blog->post = $request->post;
        $blog->image = !empty($imagePath) ? $imagePath : $blog->image;

        $blog->save();

        $notification = array('message' => 'Blog updated successfully', 'alert-type' => 'success');
        return to_route('admin.blog.post.index')->with($notification);
    }

    public function delete($id)
    {
        try {
            $blog = BlogPost::findOrFail($id);
            $this->removeImage($blog->image);
            $blog->delete();
            return response(['status' => 'success', 'message' => 'Blog deleted successfully']);
        } catch (\Exception $e) {
            logger($e);
            return response(['status' => 'error']);
        }
    } // Create Blog Ends
}
