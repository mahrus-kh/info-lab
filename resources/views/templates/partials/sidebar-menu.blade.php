<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
    <div class="menu_section">
        <h3>Menu</h3>
        <ul class="nav side-menu">
            <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="{{ route('student-card.index') }}"><i class="fa fa-credit-card"></i> Student Card</a></li>
            <li><a href="{{ route('left-stuff.index') }}"><i class="fa fa-shopping-basket"></i> Left Stuff</a></li>
            <li><a><i class="fa fa-folder-open-o"></i> Inventory <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li><a href="#">Master Inventories</a></li>
                    <li><a href="#">Transaction</a></li>
                </ul>
            </li>
            <li><a href="#"><i class="fa fa-certificate"></i> Certification</a></li>
            <li><a href="#"><i class="fa fa-calendar"></i> Schedule</a></li>
            <li><a><i class="fa fa-pencil"></i> Blog <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li><a href="#">News & Information</a></li>
                    <li><a href="#">Staff</a></li>
                </ul>
            </li>
            <li><a href="{{ route('setting.index') }}"><i class="fa fa-cogs"></i> Setting</a></li>
            <li><a href="{{ route('admin.index') }}"><i class="fa fa-user"></i> Administrator</a></li>
        </ul>
    </div>
</div>