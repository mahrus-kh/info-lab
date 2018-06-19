@extends('templates.default')
@section('content')
    <div class="x_panel border-aero">
        <div class="x_content">
            <a href="{{ route('admin.index') }}" class="btn btn-primary btn-sm">Data Administrator</a>
            @if(auth('admin')->user()->id === 1)
                <a onclick="addAdmin()" class="btn btn-primary btn-sm">Tambah Administrator</a>
            @endif
            <a onclick="setupAkun()" class="btn btn-primary btn-sm">Setup Akun</a>
        </div>
    </div>
    <div class="row">
       @foreach($admin as $row)
            <div class="col-md-3 col-sm-3 col-xs-12">
                <div class="x_panel">
                    @if(auth('admin')->user()->id === 1)
                        <div class="x_title">
                            <ul class="nav navbar-right panel_toolbox">
                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                                <li><a class="dropdown-toggle" onclick="editAdmin({{ $row->id }})"><i class="fa fa-pencil"></i></a></li>
                                <li><a class="dropdown-toggle" onclick="destroyAdmin({{ $row->id }})"><i class="fa fa-close"></i></a></li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                    @endif
                    <div class="x_content">
                        <div class="flex">
                            <ul class="list-inline widget_profile_box">
                                <li>
                                    <img src="{{ asset('images/admin-lembaga.png') }}" alt="..." class="img-circle profile_img">
                                </li>
                                <li><a><i class="fa {{ $row->status == 1 ? 'fa-check text-success' : 'fa-close text-warning' }}"></i></a></li>
                            </ul>
                        </div>
                        <br>
                        <h4 class="text-center name">{{ $row->name }}</h4>
                        <div class="flex">
                            <ul class="list-isnline count2">
                                <i class="fa fa-phone"></i> {{ $row->phone }} <br>
                                <i class="fa fa-envelope"></i> {{ $row->email }} <br>
                                <i class="fa fa-map-marker"></i> {{ $row->address }} <br>
                                <i class="fa fa-sign-in"></i> {{ $row->last_login }}
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
       @endforeach
    </div>


    {{--Modal Admin--}}
    @include('pages.admin.modal.modal-admin')
    {{--End Admin--}}


@endsection

@section('javascript')

    @if(auth()->user()->id === 1)
        @include('pages.admin.blade-js.admin-master')
    @endif
    @include('pages.admin.blade-js.admin')

@endsection