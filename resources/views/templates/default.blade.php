<!DOCTYPE html>
<html lang="en">
<!-- head -->
    @include('templates.partials.head')
<!-- /head -->
<body class="nav-md">
<div class="container body">
    <div class="main_container">
        <div class="col-md-3 left_col">
            <div class="left_col scroll-view">
                <div class="navbar nav_title" style="border: 0;">
                    <a href="index.html" class="site_title"><i class="fa fa-paw"></i> <b>Info</b>-Lab</a>
                </div>
                <div class="clearfix"></div>

                <!-- menu profile quick info -->
                <div class="profile clearfix">
                    <div class="profile_pic">
                        <img src="{{ asset('images/admin-lembaga.png') }}" alt="..." class="img-circle profile_img">
                    </div>
                    <div class="profile_info">
                        <h2 id="account-name-sidebar">{{ str_limit(auth('admin')->user()->name, 15) }}</h2>
                        <span>Online</span>
                    </div>
                </div>
                <!-- /menu profile quick info -->

                <br/>

                <!-- sidebar menu -->
                    @include('templates.partials.sidebar-menu')
                <!-- /sidebar menu -->

                <!-- /menu footer buttons -->
                    @include('templates.partials.menu-footer-buttons')
                <!-- /menu footer buttons -->
            </div>
        </div>

        <!-- top navigation -->
            @include('templates.partials.top-navigation')
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
            <div class="row">
                <!-- content here-->
                @yield('content')
                <!-- content here-->
            </div>
        </div>
        <!-- /page content -->

        <!-- footer content -->
            @include('templates.partials.footer')
        <!-- /footer content -->
    </div>
</div>
<!-- script-->
    @include('templates.partials.script')
<!-- /script-->
</body>
</html>
<!-- Javascript section -->
    @yield('javascript')
<!-- /Javascript section -->