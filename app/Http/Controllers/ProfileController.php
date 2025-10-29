<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\Address;
use App\Models\DeliveryArea;
use App\Models\Order;
use App\Models\Wishlist;
use App\Traits\FileUploadTrait;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    use FileUploadTrait;

    public function profileDashboard() {
        $deliveryAreas = DeliveryArea::where('status', 1)->get();
        $userAddresses = Address::where('user_id', Auth::user()->id)->get();
        $orders = Order::with('user')->where('user_id', Auth::user()->id)->get();
        $wishlists = Wishlist::where('user_id', Auth::user()->id)->get();
        return view('frontend.profile.dashboard', compact('deliveryAreas', 'userAddresses', 'orders', 'wishlists'));
    }
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        // $request->user()->fill($request->validated());

        $user = $request->user();
        $user->where('status', 1);
        if ($user->isDirty('email')) {
            $user->email_verified_at = null;
        }
        $user->email = $request->email;
        $user->name = $request->name;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->country = $request->country;

        $user->update();

        $notification = array(
            'message' => 'Profile updated successfully',
            'alert-type' => 'success'
        );

        return Redirect::back()->with($notification);
    }

    public function updateAvatar(Request $request) {
        $imagePath = $this->uploadImage($request, 'avatar');

        /** @var App\Models\User $user */
        $user = Auth::user();
        $user->where('status', 1);
        $user->image = $imagePath;
        $user->update();

        return response(['status' => 'success', 'message' => 'Avatar updated successfully']);
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
