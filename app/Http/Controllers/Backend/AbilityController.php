<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\AbilityDataTable;
use App\Http\Controllers\Controller;
use App\Models\Ability;
use App\Models\AbilityStat;
use App\Traits\FileUploadTrait;
use Illuminate\Http\Request;

class AbilityController extends Controller
{
    use FileUploadTrait;

    public function index(AbilityDataTable $dataTable) {
        return $dataTable->render('admin.ability.index');
    }

    public function create() {
        return view('admin.ability.create');
    }

    public function store(Request $request) {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:1000',
            'status' => 'boolean|required',
            'image' => 'required',
        ]);

        $ability = new Ability();
        $imagePath = $this->uploadImage($request, 'image');
        $ability->title = $request->title;
        $ability->description = $request->description;
        $ability->status = $request->status;
        $ability->image = $imagePath;
        $ability->save();

        $notification = array(
            'message' => 'Ability section created successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('admin.ability.index')->with($notification);
    }

    public function edit($id)
    {
        $ability = Ability::findOrFail($id);
        return view('admin.ability.edit', compact('ability'));
    }

    public function update(Request $request, $id) {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:1000',
            'status' => 'boolean|required',
            'image' => 'nullable',
        ]);

        $ability = Ability::findOrFail($id);
        $imagePath = $this->uploadImage($request, 'image', $ability->image);
        $ability->title = $request->title;
        $ability->description = $request->description;
        $ability->status = $request->status;
        $ability->image = !empty($imagePath) ? $imagePath : $ability->image;
        $ability->update();

        $notification = array(
            'message' => 'Ability section updated successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('admin.ability.index')->with($notification);
    }

    public function destroy($id) {
        try {
            $table = "#ability-table";
            $ability = Ability::findOrFail($id);
            $this->removeImage($ability->image);
            $ability->delete();
            return response(['status' => 'success', 'message' => 'Ability Section Deleted Successfully', 'table' => $table]);
        } catch (\Exception $e) {
            logger($e);
            return response(['status' => 'error', 'message' => 'Something went wrong']);
        }
    }

    public function storeUpdate(Request $request) {
        AbilityStat::updateOrCreate(
            ['id' => 1],
            [
                'value' => $request->statistic_ability,
                'title' => $request->statistic_title,

                'value1' => $request->statistic_ability1,
                'title1' => $request->statistic_title1,

                'value2' => $request->statistic_ability2,
                'title2' => $request->statistic_title2
            ]
        );

        $notification = array(
            'message' => 'Ability stat updated successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('admin.ability.index')->with($notification);
    }
}
