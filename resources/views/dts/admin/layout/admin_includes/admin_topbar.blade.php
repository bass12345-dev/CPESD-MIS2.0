<nav class="navbar navbar-expand navbar-light navbar-bg">
    <a class="sidebar-toggle js-sidebar-toggle">
        <i class="hamburger align-self-center"></i>
    </a>
    @include('dts.includes.office_in_charge_display')
    <div class="navbar-collapse collapse">
        <ul class="navbar-nav navbar-align">
            <li class="nav-item ">
                <a href="{{ url('/dts/user/dashboard') }}" class="btn btn-primary">User Panel</a>
            </li>
            @include('dts.includes.logout')
        </ul>
    </div>
</nav>