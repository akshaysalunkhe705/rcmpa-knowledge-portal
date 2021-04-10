<?php
namespace App\Http\Controllers\GeneralMaster;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Models\LocationModel;

class LocationController extends Controller
{
    public function index()
    {
        $locationDataset = LocationModel::all();
        return view('general_master.location.index', [
            'locationDataset' => $locationDataset
        ]);
    }

    public function add(Request $request)
    {
        $model = new LocationModel();
        $model->add($request);
        return redirect()->back()->with('alert', 'Location Inserted Successfuly!');
    }

    public function edit(Request $request, $id)
    {
        $model = new LocationModel();
        return $model->edit($request, $id);
    }

    public function remove($ids)
    {
        $model = new LocationModel();
        $model->remove($ids);
    }
}
