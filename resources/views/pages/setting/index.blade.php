@extends('templates.default')
@section('content')
    <div class="row">
        <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Location</h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><button type="button" class="btn btn-success btn-sm" onclick="addLocation()"><i class="fa fa-plus"></i> Add New</button></li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover" id="location-datatables">
                            <thead>
                            <tr>
                                <th>Location</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Program Study</h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><button type="button" class="btn btn-success btn-sm" onclick="addProdi()"><i class="fa fa-plus"></i> Add New</button></li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover" id="prodi-datatables">
                            <thead>
                            <tr>
                                <th>Program Study</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{--Modal Location--}}
        @include('pages.setting.modal.modal-location')
    {{--End Location--}}

    {{--Modal Prodi--}}
    @include('pages.setting.modal.modal-prodi')
    {{--End Prodi--}}

@endsection

@section('javascript')

    @include('pages.setting.blade-js.location')
    @include('pages.setting.blade-js.prodi')

@endsection