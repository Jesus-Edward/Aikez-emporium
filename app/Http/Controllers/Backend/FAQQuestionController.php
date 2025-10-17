<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\FAQQuestion;
use Illuminate\Http\Request;

class FAQQuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $faqs = FAQQuestion::latest()->get();
        return view('admin.faq.index', compact('faqs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.faq.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'question' => 'required|max:255',
            'status' => 'required|boolean|in:1,0'
        ]);

        $faq = new FAQQuestion();
        $faq->question = $request->question;
        $faq->status = $request->status;
        $faq->save();
        $notification = array('message' => 'FAQ created successfully', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
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
        $faq = FAQQuestion::findOrFail($id);
        return view('admin.faq.edit', compact('faq'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'question' => 'required|max:255',
            'status' => 'required|boolean|in:1,0'
        ]);

        $faq = FAQQuestion::findOrFail($id);
        $faq->question = $request->question;
        $faq->status = $request->status;
        $faq->update();
        $notification = array('message' => 'FAQ updated successfully', 'alert-type' => 'success');
        return redirect()->route('admin.faq.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $faq = FAQQuestion::findOrFail($id);
            $faq->delete();
            $table = '#faq-table';
            return response(['status' => 'success', 'message' => 'FAQ deleted successfully']);
        } catch (\Exception $e) {
            logger($e);
            return response(['status' => 'error', 'message' => 'Something went wrong']);
        }
    }
}
