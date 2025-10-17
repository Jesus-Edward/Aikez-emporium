<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\TermsAndCondition;
use App\Traits\FileUploadTrait;
use Illuminate\Http\Request;

class TermsAndConditionController extends Controller
{
    use FileUploadTrait;

    public function index() {
        $t_and_c = TermsAndCondition::first();
        return view('admin.t&c.index', compact('t_and_c'));
    }

    public function update(Request $request) {
        $request->validate([
            'company_name' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'image' => 'nullable|image|max:5048',
            'terms_and_conditions' => 'required|string'
        ]);

        $t_and_c = TermsAndCondition::first();
        $imagePath = $this->uploadImage($request, 'image', @$t_and_c->image);

        TermsAndCondition::updateOrCreate(
            ['id' => 1],
            [
                'company_name' => $request->company_name,
                'title' => $request->title,
                'image' => !empty($imagePath) ? $imagePath : $t_and_c->image,
                'terms_and_conditions' => $request->terms_and_conditions
            ]
        );

        $notification = array(
            'message' => 'Terms and Conditions updated successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }
}
