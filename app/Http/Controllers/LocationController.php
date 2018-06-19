<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Location;
use Yajra\DataTables\DataTables;

class LocationController extends Controller
{
    public function store(Request $request)
    {
        return Location::create([
            'location' => $request->location
        ]);
    }

    public function edit($id)
    {
        $location = Location::find($id);
        return response()->json($location);
    }

    public function update(Request $request, Location $location)
    {
        $location->update([
            'location' => $request->location
        ]);
    }

    public function destroy($id)
    {
        return Location::destroy($id);
    }

    public function listLocation()
    {
        $location = Location::all(['id','location']);
        return response()->json($location);
    }

    public function loadDatatables()
    {
        $location = Location::all(['id','location']);

        return DataTables::of($location)
            ->addColumn('actions', function ($location){
                return '
                <a onclick="editLocation(' . $location->id . ')" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i></a>
                <a onclick="destroyLocation(' . $location->id . ')" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></a>
                ';
            })
            ->rawColumns(['actions'])
            ->make(true);
    }
}
