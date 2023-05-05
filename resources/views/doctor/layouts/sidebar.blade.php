<?php
 use Illuminate\Support\Facades\URL;
?>

<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <a class="nav-link" href="{{ url('doctor/information_doctor', Auth::user()->id) }}">
                    <div class="sb-nav-link-icon"><i class="fa-solid fa-user-doctor"></i></div>
                    Trang bác sĩ
                </a>
                <a class="nav-link" href="{{ url('doctor/schedule_doctor') }}">
                    <div class="sb-nav-link-icon"><i class="fa fa-calendar"></i></div>
                    Lịch trực
                </a>

                <a class="nav-link" href="{{ url('doctor/manager_patient') }}">
                    <div class="sb-nav-link-icon"><i class="fa-solid fa-person"></i></div>
                    Quản lí bệnh nhân
                </a>
            </div>
        </div>
    </nav>
</div>
