<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddressCreateRequest;
use App\Models\Address;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AddressController extends Controller
{
    public function createAddress(AddressCreateRequest $request)
    {
        $address = new Address();

        /** @var \App\Models\User $user */
        $address->user_id = Auth::user()->id;
        $address->delivery_area_id = $request->area;
        $address->first_name = $request->first_name;
        $address->last_name = $request->last_name;
        $address->phone = $request->phone;
        $address->email = $request->email;
        $address->address = $request->address;
        // $address->type = $request->type;

        $address->save();

        $notification = array('message' => 'Address created successfully', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }

    public function updateAddress(AddressCreateRequest $request, $id)
    {
        $address = Address::findOrFail($id);

        $address->user_id = Auth::user()->id;
        $address->delivery_area_id = $request->area;
        $address->first_name = $request->first_name;
        $address->last_name = $request->last_name;
        $address->phone = $request->phone;
        $address->email = $request->email;
        $address->address = $request->address;
        // $address->type = $request->type;

        $address->update();

        $notification = array('message' => 'Address updated successfully', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }

    function deleteAddress($id)
    {
        $address = Address::findOrFail($id);

        if ($address && $address->user_id === Auth::user()->id) {
            $address->delete();

            return response(['status' => 'success', 'message' => 'Deleted Successfully!']);
        }

        return response(['status' => 'error', 'message' => 'Something went wrong in the frontend!']);
    }
}
