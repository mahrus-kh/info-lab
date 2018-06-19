@extends('templates.default')
@section('content')
    <div class="x_panel">
        <div class="x_content">
            <div class="row">
                <div class="col-md-3">
                    Program Study :
                    <select class="form-control" name="prodi_id_filter">
                        <option value="All">All</option>
                        @foreach($prodi as $row)
                            <option value="{{ $row->id }}">{{ $row->prodi }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-4">
                    Admin Who Created :
                    <select class="form-control" name="admin_id_filter">
                        <option value="All">All</option>
                        @foreach($admin as $row)
                            <option value="{{ $row->id }}">{{ $row->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-3">
                    Print Status :
                    <select class="form-control" name="print_status_filter">
                        <option value="All">All</option>
                        <option value="1">Printed</option>
                        <option value="0">Not Printed</option>

                    </select>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-3">
                    Card Status :
                    <select class="form-control" name="card_status_filter">
                        <option value="All">All</option>
                        <option value="0">First Time</option>
                        <option value="1">Second Time (or more)</option>
                    </select>
                </div>
                <div class="col-md-4">
                    Admin Who Taken :
                    <select class="form-control" name="admin_taken_id_filter">
                        <option value="All">All</option>
                        @foreach($admin as $row)
                            <option value="{{ $row->id }}">{{ $row->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-3">
                    Taken Status :
                    <select class="form-control" name="taken_status_filter">
                        <option value="All">All</option>
                        <option value="1">Taken</option>
                        <option value="0">Have Not Taken</option>
                    </select>
                </div>
                <div class="col-md-2">
                    Tools : <br>
                    <button type="button" class="btn btn-success btn-block" onclick="loadDatatables()">Showing</button>
                </div>
            </div>
        </div>
    </div>
    <div class="x_panel">
        <div class="x_title">
            <h2>Student Card</h2>
            <ul class="nav navbar-right panel_toolbox">
                <li><button type="button" class="btn btn-success btn-sm" onclick="addStudentCard()"><i class="fa fa-plus"></i> Add New</button></li>
            </ul>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <div class="table-responsive">
                <table class="table table-striped table-hover" id="student_card_datatables">
                    <thead>
                    <tr>
                        <th>NIM</th>
                        <th>Name</th>
                        <th>Prodi</th>
                        <th>Print</th>
                        <th>Taken</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>
    </div>

    {{--Modal Contact--}}
    @include('pages.student-card.modal.modal-student-card')
    {{--End Contact--}}

@endsection

@section('javascript')

    @include('pages.student-card.blade-js.student-card')

@endsection