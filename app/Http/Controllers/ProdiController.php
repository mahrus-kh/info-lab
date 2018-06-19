<?php

namespace App\Http\Controllers;

use App\Prodi;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class ProdiController extends Controller
{
    public function store(Request $request)
    {
        return Prodi::create([
            'prodi' => $request->prodi
        ]);
    }

    public function edit($id)
    {
        $prodi = Prodi::find($id);
        return response()->json($prodi);
    }

    public function update(Request $request, Prodi $prodi)
    {
        $prodi->update([
            'prodi' => $request->prodi
        ]);
    }

    public function destroy($id)
    {
        return Prodi::destroy($id);
    }

    public function listProdi()
    {
        $prodi = Prodi::all(['id','prodi']);
        return response()->json($prodi);
    }

    public function loadDatatables()
    {
        $prodi = Prodi::all(['id','prodi']);

        return DataTables::of($prodi)
            ->addColumn('actions', function ($prodi){
                return '
                <a onclick="editProdi(' . $prodi->id . ')" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i></a>
                <a onclick="destroyProdi(' . $prodi->id . ')" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></a>
                ';
            })
            ->rawColumns(['actions'])
            ->make(true);
    }
}
