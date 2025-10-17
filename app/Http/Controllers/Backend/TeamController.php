<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\TeamDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\TeamStoreRequest;
use App\Models\Team;
use App\Traits\FileUploadTrait;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    use FileUploadTrait;

    /**
     * Display a listing of the resource.
     */
    public function index(TeamDataTable $dataTable)
    {
        return $dataTable->render('admin.team.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.team.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TeamStoreRequest $request)
    {
        $imagePath = $this->uploadImage($request, 'image');
        $team = new Team();
        $team->name = $request->name;
        $team->member_role = $request->member_role;
        $team->image = $imagePath;
        $team->status = $request->status;
        $team->facebook = $request->facebook;
        $team->twitter = $request->twitter;
        $team->instagram = $request->instagram;
        $team->gmail = $request->gmail;
        $team->save();

        $notification = array(
            'message' => 'Team member created successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('admin.team.index')->with($notification);
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
        $team = Team::findOrFail($id);
        return view('admin.team.edit', compact('team'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TeamStoreRequest $request, string $id)
    {
        $team = Team::findOrFail($id);
        $imagePath = $this->uploadImage($request, 'image', $team->image);
        $team->name = $request->name;
        $team->member_role = $request->member_role;
        $team->image = !empty($imagePath) ? $imagePath : $team->image;
        $team->status = $request->status;
        $team->facebook = $request->facebook;
        $team->twitter = $request->twitter;
        $team->instagram = $request->instagram;
        $team->gmail = $request->gmail;
        $team->update();

        $notification = array(
            'message' => 'Team member updated successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('admin.team.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $team = Team::findOrFail($id);
            $this->removeImage($team->image);
            $team->delete();
            $table = '#team-table';

            return response(['status' => 'success', 'message' => 'Team member deleted successfully', 'table' => $table]);
        } catch (\Exception $e) {
            logger($e);
            return response(['status' => 'error', 'message' => 'Something went wrong']);
        }
    }
}
