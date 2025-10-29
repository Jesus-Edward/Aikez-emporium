<?php

namespace App\Http\Controllers;

use App\DataTables\SocialLinkDataTable;
use App\Models\SocialLink;
use Illuminate\Http\Request;

class SocialLinkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(SocialLinkDataTable $dataTable)
    {
        return $dataTable->render('admin.social-links.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.social-links.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'icon' => ['required', 'max:255'],
            'name' => ['required', 'max:255'],
            'link' => ['required', 'max:1000', 'url'],
            'status' => ['required', 'boolean']
        ]);

        $social_link = new SocialLink();
        $social_link->icon = $request->icon;
        $social_link->name = $request->name;
        $social_link->social_link = $request->link;
        $social_link->status = $request->status;

        $social_link->save();
        $notice = array('message' => 'Social Link Created', 'alert-type' => 'success');

        return to_route('admin.social-links.index')->with($notice);
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
        $social_link = SocialLink::findOrFail($id);
        return view('admin.social-links.edit', compact('social_link'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'icon' => ['required', 'max:255'],
            'name' => ['required', 'max:255'],
            'link' => ['required', 'max:1000', 'url'],
            'status' => ['required', 'boolean']
        ]);

        $social_link = SocialLink::findOrFail($id);
        $social_link->icon = $request->icon;
        $social_link->name = $request->name;
        $social_link->social_link = $request->link;
        $social_link->status = $request->status;

        $social_link->update();
        $notice = array('message' => 'Social Link Updated', 'alert-type' => 'success');

        return to_route('admin.social-links.index')->with($notice);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $social = SocialLink::findOrFail($id);
            $social->delete();

            return response(['status' => 'success', 'message' => 'Deleted Successfully']);
        } catch (\Exception $e) {
            logger($e);
            return response(['status' => 'error', 'message' => 'Something went wrong in the frontend']);
        }
    }
}
