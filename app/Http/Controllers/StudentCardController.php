<?php

namespace App\Http\Controllers;

use App\Admin;
use App\Prodi;
use App\StudentCard;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class StudentCardController extends Controller
{
    public function index()
    {
        $prodi = Prodi::all(['id','prodi']);
        $admin = Admin::all('id','name');
        return view('pages.student-card.index', compact('prodi','admin'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        return StudentCard::create([
            'nim' => $request->nim,
            'name' => $request->name,
            'prodi_id' => $request->prodi_id,
            'place_of_birth' => $request->place_of_birth,
            'date_of_birth' => $request->date_of_birth,
            'address' => $request->address,
            'city' => $request->city,
            'phone' => $request->phone,
            'etc' => $request->etc,
            'photo_number' => $request->photo_number,
            'card_status' => $request->card_status,
            'admin_id' => auth('admin')->user()->id,
            'print_status' => $request->print_status,
            'taken_status' => $request->taken_status,
        ]);
    }

    public function edit($id)
    {
        $student_card = StudentCard::find($id);
        $student_card->admin_id = $student_card->admin->name;
        if (isset($student_card->admin_taken_id)) {
            $student_card->admin_taken_id = Admin::find($student_card->admin_taken_id)->name;
        }

        return response()->json($student_card);
    }

    public function update(Request $request, StudentCard $student_card)
    {

        if ($request->taken_status == 1) {
            $request->print_status = 1;
            if (!isset($student_card->admin_taken_id)) {
                $request->admin_taken_id = auth('admin')->user()->id;
            } else {
                $request->admin_taken_id = $student_card->admin_taken_id;
            }
            $request->taken_at = Carbon::now();
        } elseif ($request->taken_status == 0) {
            $request->admin_taken_id = $request->taken_at = null;
        }

        $student_card->update([
            'nim' => $request->nim,
            'name' => $request->name,
            'prodi_id' => $request->prodi_id,
            'place_of_birth' => $request->place_of_birth,
            'date_of_birth' => $request->date_of_birth,
            'address' => $request->address,
            'city' => $request->city,
            'phone' => $request->phone,
            'etc' => $request->etc,
            'photo_number' => $request->photo_number,
            'card_status' => $request->card_status,
            'print_status' => $request->print_status,
            'taken_status' => $request->taken_status,
            'admin_taken_id' => $request->admin_taken_id,
            'taken_at' => $request->taken_at,
        ]);
    }

    public function destroy($id)
    {
        return StudentCard::destroy($id);
    }

    public function loadDatatables(Request $request)
    {
        $filter = $this->filterDatatables($request);

        $student_card = StudentCard::select(['id', 'nim', 'name', 'prodi_id', 'print_status', 'taken_status'])
            ->where($filter)
            ->get();

        foreach ($student_card as $card) {
            $card->prodi_id = Prodi::find($card->prodi_id)->prodi;
        }
        return DataTables::of($student_card)
            ->addColumn('actions', function ($student_card) {
                return '
                <a onclick="printStudentCard(' . $student_card->id . ')" class="btn btn-xs"><i class="fa fa-print text-warning"></i></a>
                <a onclick="editStudentCard(' . $student_card->id . ')" class="btn btn-xs"><i class="fa fa-pencil text-primary"></i></a>
                <a onclick="destroyStudentCard(' . $student_card->id . ')" class="btn btn-xs"><i class="fa fa-trash text-danger"></i></a>
                ';
            })
            ->rawColumns(['actions'])
            ->make(true);
    }

    private function filterDatatables($request) //stupid code //ndang perbaiki
    {
        $filter = [];
        if ($request->prodi_id != "All") {
            $filter ['prodi_id'] = $request->prodi_id;
        }
        if ($request->admin_id != "All") {
            $filter ['admin_id'] = $request->admin_id;
        }
        if ($request->print_status != "All") {
            $filter ['print_status'] = $request->print_status;
        }
        if ($request->card_status != "All") {
            $filter ['card_status'] = $request->card_status;
        }
        if ($request->admin_taken_id != "All") {
            $filter ['admin_taken_id'] = $request->admin_taken_id;
        }
        if ($request->taken_status != "All") {
            $filter ['taken_status'] = $request->taken_status;
        }
        return $filter;
    }
}
