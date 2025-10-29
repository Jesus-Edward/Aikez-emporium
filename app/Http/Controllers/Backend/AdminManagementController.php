<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\AdminManagementDataTable;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class AdminManagementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(AdminManagementDataTable $dataTable)
    {
        return $dataTable->render('admin.admin-mgt.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.admin-mgt.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|lowercase|max:255|unique:users,email',
            'phone' => 'nullable|string|max:255',
            'role' => 'required|string|in:admin,user',
            'password' => 'required|confirmed|min:8'
        ]);

        $admin = new User();
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->phone = $request->phone;
        $admin->role = $request->role;
        $admin->password = bcrypt($request->password);
        $admin->save();

        $notification = array(
            'message' => 'Admin created successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('admin.admin-mgt.index')->with($notification);
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
        $admin = User::findOrFail($id);
        return view('admin.admin-mgt.edit', compact('admin'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $admin = User::findOrFail($id);

        if ($id == 1) {
            throw ValidationException::withMessages(['message' => "You can't update the super admin"]);
        }

        $request->validate([
            'name' => ['required', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:users,email,' . $id],
            'role' => ['required', 'in:admin'],
        ]);

        if ($request->has('password') && $request->filled('password')) {
            $request->validate([
                'password' => ['confirmed', 'min:8'],
            ]);

            $admin->password = bcrypt($request->password);
        }

        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->role = $request->role;
        $admin->update();

        $notification = array(
            'message' => 'Admin updated successfully',
            'alert-type' => 'success'
        );
        return to_route('admin.admin-mgt.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if ($id == 1) {
            throw ValidationException::withMessages(['message' => "You can't delete the super admin"]);
        }
        try {
            $admin = User::findOrFail($id);
            $admin->delete();

            return response(['status' => 'success', 'message' => 'Deleted Successfully!']);
        } catch (\Exception $e) {
            logger($e);
            return response(['status' => 'error', 'message' => 'Something went wrong in the frontend']);
        }
    }
}
