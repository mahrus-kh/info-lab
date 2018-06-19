@extends('templates.default')
@section('content')
    <div class="x_panel">
        <div class="x_content">
            <div class="row">
                <div class="col-md-2">
                    Location :
                    <select class="form-control" name="location_id_filter">
                        <option value="All">All</option>
                        @foreach($location as $row)
                            <option value="{{ $row->id }}">{{ $row->location }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-3">
                    Admin Who Posted :
                    <select class="form-control" name="admin_id_filter">
                        <option value="All">All</option>
                        @foreach($admin as $row)
                            <option value="{{ $row->id }}">{{ $row->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-3">
                    Admin Who Taken :
                    <select class="form-control" name="admin_taken_id_filter">
                        <option value="All">All</option>
                        @foreach($admin as $row)
                            <option value="{{ $row->id }}">{{ $row->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-2">
                    Status :
                    <select class="form-control" name="status_filter">
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
            <h2>Left Stuff</h2>
            <ul class="nav navbar-right panel_toolbox">
                <li><button type="button" class="btn btn-success btn-sm" onclick="addLeftStuff()"><i class="fa fa-plus"></i> Add New</button></li>
            </ul>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <div class="table-responsive">
                <table class="table table-striped table-hover" id="left_stuff_datatables">
                    <thead>
                    <tr>
                        <th>Stuff Name</th>
                        <th>Location</th>
                        <th>Posted At</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>
    </div>

    {{--Modal Contact--}}
    @include('pages.left-stuff.modal.modal-left-stuff')
    {{--End Contact--}}

@endsection

@section('javascript')

    @include('pages.left-stuff.blade-js.left-stuff')

@endsection