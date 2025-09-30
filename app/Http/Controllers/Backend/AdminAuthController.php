<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminUpdateDetailsRequest;
use App\Models\User;
use App\Traits\FileUploadTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\ValidationException;

class AdminAuthController extends Controller
{
    use FileUploadTrait;

    public function profile() {
        return view('admin.profile.index');
    }

    public function updateProfile(AdminUpdateDetailsRequest $request, $id) {

        DB::beginTransaction();
        try {

            $user =  User::findOrFail($id);
            $imagePath  = $this->uploadImage($request, 'photo', null, 'uploads/admin_images');

            $user->name = $request->name;
            $user->email = $request->email;
            $user->phone = $request->phone;
            $user->address = $request->address;
            $user->status = $request->status;
            $user->country = $request->country;
            $user->image = $imagePath ? $imagePath : $user->image;
            $user->update();

            DB::commit();
            $notification = array(
                'message' => 'Profile updated successfully',
                'alert-type' => 'success'
            );

            return redirect()->back()->with($notification);
        } catch (\Exception $e) {
            DB::rollBack();
            logger($e);
            throw ValidationException::withMessages([$e]);
        }

    }

    public function updateAdminPassword(Request $request)
    {
        $validated = $request->validate([
            'current_password' => ['required', 'current_password'],
            'password' => ['required', Password::defaults(), 'confirmed'],
        ]);

        $request->user()->update([
            'password' => Hash::make($validated['password']),
        ]);

        $notification = array(
            'message' => 'Password updated successfully',
            'alert-type' => 'success'
        );
        return back()->with($notification);
    }
}
