<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\FAQAnswer;
use App\Models\FAQQuestion;
use Illuminate\Http\Request;

class FAQAnswerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $faq_answer = FAQAnswer::latest()->get();
        return view('admin.faa.index', compact('faq_answer'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $faqs = FAQQuestion::all();
        return view('admin.faa.create', compact('faqs'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'question_id' => 'required|integer|max:100',
            'answer' => 'required|max:1000',
            'status' => 'boolean|required|in:1,0'
        ]);

        $answer = new FAQAnswer();
        $answer->question_id = $request->question_id;
        $answer->answer = $request->answer;
        $answer->status = $request->status;
        $answer->save();
        $notification = array('message' => 'Answer created successfully', 'alert-type' => 'success');
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
        $faa = FAQAnswer::findOrFail($id);
        $faqs = FAQQuestion::all();
        return view('admin.faa.edit', compact('faa', 'faqs'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'question_id' => 'required|integer|max:100',
            'answer' => 'required|max:1000',
            'status' => 'boolean|required|in:1,0'
        ]);

        $answer = FAQAnswer::findOrFail($id);
        $answer->question_id = $request->question_id;
        $answer->answer = $request->answer;
        $answer->status = $request->status;
        $answer->update();
        $notification = array('message' => 'Answer updated successfully', 'alert-type' => 'success');
        return redirect()->route('admin.faq-answer.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $faq = FAQAnswer::findOrFail($id);
            $faq->delete();
            return response(['status' => 'success', 'message' => 'FAQ deleted successfully']);
        } catch (\Exception $e) {
            logger($e);
            return response(['status' => 'error', 'message' => 'Something went wrong']);
        }
    }
}
