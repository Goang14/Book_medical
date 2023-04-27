<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <a class="nav-link" href="">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Tổng quan
                </a>
                <a class="nav-link" href="{{ url('admin/account') }}">
                    <div class="sb-nav-link-icon"><i class="fa-solid fa-user"></i></div>
                    Quản lí tài khoản
                </a>

                <a class="nav-link" href="{{ url('admin/department') }}">
                    <div class="sb-nav-link-icon"><i class="fa-regular fa-building-user"></i></div>
                    Quản lí khoa
                </a>

                <a class="nav-link" href="{{ url('admin/doctor') }}">
                    <div class="sb-nav-link-icon"><i class="fa-solid fa-user-doctor"></i></div>
                    Quản lí bác sĩ
                </a>

                <a class="nav-link" href="{{ url('admin/patient') }}">
                    <div class="sb-nav-link-icon"><i class="fa-solid fa-person"></i></div>
                    Quản lí bệnh nhân
                </a>

                <a class="nav-link" href="{{ url('admin/room') }}">
                    <div class="sb-nav-link-icon"><i class="fa-solid fa-hospital"></i></div>
                    Quản lí phòng
                </a>

                <a class="nav-link" href="{{ url('admin/on_call_schedule') }}">
                    <div class="sb-nav-link-icon"><i class="fa fa-calendar"></i></div>
                    Quản lí lịch trực bác sĩ
                </a>
                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </nav>
</div>
