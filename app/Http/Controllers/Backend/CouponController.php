<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\CouponDataTable;
use App\Http\Controllers\Controller;
use App\Mail\CouponMail;
use App\Models\Coupon;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class CouponController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(CouponDataTable $dataTable)
    {
        return $dataTable->render('admin.coupon.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.coupon.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'code' => 'required|string|max:255',
            'quantity' => 'required|integer|max:255',
            'min_purchase_amount' => 'required|string',
            'expired_date' => 'required|date',
            'discount_type' => ['required', 'in:percent,amount'],
            'discount' => ['required'],
            'status' => ['required', 'boolean']
        ]);

        $coupon = new Coupon();
        $coupon->name = $request->name;
        $coupon->code = $request->code;
        $coupon->quantity = $request->quantity;
        $coupon->min_purchase_amount = $request->min_purchase_amount;
        $coupon->expired_date = $request->expired_date;
        $coupon->discount_type = $request->discount_type;
        $coupon->discount = $request->discount;
        $coupon->status = $request->status;

        $coupon->save();

        $notification = array(
            'message' => 'Coupon created successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('admin.coupon.index')->with($notification);
    }

    /**
     * Display the specified resource.
     */
    public function show(Coupon $coupon)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Coupon $coupon)
    {
        return view('admin.coupon.edit', compact("coupon"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Coupon $coupon)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'code' => 'required|string|max:255',
            'quantity' => 'required|integer|max:255',
            'min_purchase_amount' => 'required|string',
            'expired_date' => 'required|date',
            'discount_type' => ['required', 'in:percent,amount'],
            'discount' => ['required'],
            'status' => ['required', 'boolean']
        ]);

        $coupon->update([
            'name' => $request->name,
            'code' => $request->code,
            'discount' => $request->discount,
            'expired_date' => $request->expired_date,
            'discount_type' => $request->discount_type,
            'min_purchase_amount' => $request->min_purchase_amount,
            'status' => $request->status,
            'quantity' => $request->quantity
        ]);

        $notification = array(
            'message' => 'Coupon updated successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('admin.coupon.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Coupon $coupon)
    {
        try {
            $coupon->delete();
            $table = '#coupon-table';
            return response()->json(['status' => 'success', 'message' => 'Coupon deleted successfully', 'table' => $table]);
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => 'Something went wrong, try again!']);
        }
    }

    public function sendCoupon(Request $request) {
        $request->validate([
            'email' => 'nullable|email|lowercase|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string|max:1000',
            'coupon' => 'required|string|max:255'
        ]);

        $emails = [];
        $coupon = Coupon::where('code', $request->coupon)->orWhere('name', $request->coupon)->firstOrFail();
        $user = User::where(['status' => 1, 'role' => 'user'])->pluck('email')->toArray();

        if ($request->filled('email')) {
            $emails = array_map('trim', explode(',', $request->email));
        }else {
            $emails = $user;
        }

        foreach ($emails as $email) {
            Mail::to($email)->send(new CouponMail($coupon, $request->subject, $request->message, $request->coupon));
        }

        $notification = array(
            'message' => 'Coupon sent successfully',
            'alert-type' => 'success'
        );

        return back()->with($notification);
    }
}
