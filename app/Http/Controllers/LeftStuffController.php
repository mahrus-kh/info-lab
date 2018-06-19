<?php

namespace App\Http\Controllers;

use App\Admin;
use App\Location;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\LeftStuff;

class LeftStuffController extends Controller
{

    public function index()
    {
        $location = Location::all(['id', 'location']);
        $admin = Admin::all(['id', 'name']);
        return view('pages.left-stuff.index', compact('location', 'admin'));
    }

    public function store(Request $request)
    {
        return LeftStuff::create([
            'stuff_name' => $request->stuff_name,
            'location_id' => $request->location_id,
            'who_posted' => $request->who_posted,
            'etc' => $request->etc,
            'admin_id' => auth('admin')->user()->id,
            'status' => '0',
        ]);
    }

    public function edit($id)
    {
        $left_stuff = LeftStuff::find($id);
        $left_stuff->admin_id = $left_stuff->admin->name;
        if (isset($left_stuff->admin_taken_id)) {
            $left_stuff->admin_taken_id = Admin::find($left_stuff->admin_taken_id)->name;
        }

        return response()->json($left_stuff);
    }


    public function update(Request $request, LeftStuff $left_stuff)
    {
        if ($request->status == 1) {
            $this->validate($request, [
                'who_taken' => 'required'
            ]);
            if (!isset($left_stuff->admin_taken_id)) {
                $request->admin_taken_id = auth('admin')->user()->id;
            } else {
                $request->admin_taken_id = $left_stuff->admin_taken_id;
            }
            $request->taken_at = Carbon::now();
        } elseif ($request->status == 0) {
            $request->who_taken = $request->admin_taken_id = $request->taken_at = null;
        }

        $left_stuff->update([
            'stuff_name' => $request->stuff_name,
            'location_id' => $request->location_id,
            'who_posted' => $request->who_posted,
            'etc' => $request->etc,
            'status' => $request->status,
            'who_taken' => $request->who_taken,
            'admin_taken_id' => $request->admin_taken_id,
            'taken_at' => $request->taken_at
        ]);
    }

    public function destroy($id)
    {
        return LeftStuff::destroy($id);
    }

    public function loadDatatables(Request $request)
    {
        $filter = []; // stupid code -_-
        if ($request->location_id != "All") {
            $filter['location_id'] = $request->location_id;
        }
        if ($request->admin_id != "All") {
            $filter['admin_id'] = $request->admin_id;
        }
        if ($request->admin_taken_id != "All") {
            $filter['admin_taken_id'] = $request->admin_taken_id;
        }
        if ($request->status != "All") {
            $filter['status'] = $request->status;
        } // stupid code -_-

        $left_stuff = LeftStuff::select(['id', 'stuff_name', 'location_id', 'created_at', 'status'])
            ->where($filter)
            ->get();

        foreach ($left_stuff as $stuff) {
            $stuff->location_id = Location::find($stuff->location_id)->location;
//            $stuff->created_at = Carbon::
        }
        return DataTables::of($left_stuff)
            ->addColumn('actions', function ($left_stuff) {
                return '
                <a onclick="editLeffStuff(' . $left_stuff->id . ')" class="btn btn-xs"><i class="fa fa-pencil text-primary"></i></a>
                <a onclick="destroyLeftStuff(' . $left_stuff->id . ')" class="btn btn-xs"><i class="fa fa-trash text-danger"></i></a>
                ';
            })
            ->rawColumns(['actions'])
            ->make(true);
    }
}
