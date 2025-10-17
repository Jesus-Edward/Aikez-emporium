<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Traits\FileUploadTrait;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    use FileUploadTrait;

    public function index() {
        $contact = Contact::first();
        return view('admin.contact.index', compact('contact'));
    }

    public function update(Request $request) {
        $request->validate([
            'up_title' => "required|string|max:255",
            'down_title' => "required|string|max:255",
            'image' => "nullable|image|max:5048",
            'image2' => "nullable|image|max:5048",
            'short_text' => "required|string|max:255",
            'first_email' => "required|email|max:255",
            'second_email' => "required|email|max:255",
            'first_phone' => "required|string|max:255",
            'second_phone' => "required|string|max:255",
            'first_address' => "required|string|max:255",
            'second_address' => "required|string|max:255",
            'map_link' => "required|url|string|max:1000",
        ]);


        $contact = Contact::first();
        $firstImage = $this->uploadImage($request, 'image', $contact->up_image);
        $secondImage = $this->uploadImage($request, 'image2', $contact->down_image);

        Contact::updateOrCreate(
            ['id' => 1],
            [
                'up_title' => $request->up_title,
                'down_title' => $request->down_title,
                'up_image' => !empty($firstImage) ? $firstImage : $contact->up_image,
                'down_image' => !empty($secondImage) ? $secondImage : $contact->down_image,
                'short_text' => $request->short_text,
                'first_mail' => $request->first_email,
                'second_mail' => $request->second_email,
                'first_phone' => $request->first_phone,
                'second_phone' => $request->second_phone,
                'first_address' => $request->first_address,
                'second_address' => $request->second_address,
                'map_link' => $request->map_link
            ]
        );

        $notification = array(
            'message' => 'Contact details updated successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }
}
