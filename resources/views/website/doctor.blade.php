@extends('layouts.app')

@section('content')
<section class="section doctors">
    <div class="container">
          <div class="row justify-content-center">
               <div class="col-lg-6 text-center">
                  <div class="section-title">
                      <h2>Bác sĩ</h2>
                      <div class="divider mx-auto my-4"></div>
                      <p>Chúng tôi cung cấp một loạt các dịch vụ sáng tạo cho khách hàng. Nhưng điều quan trọng nhất là niềm vui. Không phải là văn phòng hạnh phúc</p>
                  </div>
              </div>
          </div>

        <div class="row">
            @foreach ($doctor as $value)
                <div class="col-lg-4 col-md-6">
                    <div class="department-block mb-5">
                        <img src="{{ asset('storage/avatar/' . $value->image) }}" alt="doctor-image" style="height: 416px" class="img-fluid w-100">
                        <div class="content mt-3">
                            <h4 class="mb-0">{{ $value->name }}</h4>
                            <p>{{ $value->department_name }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
  </section>
  <!-- /portfolio -->
  <section class="section cta-page">
      <div class="container">
          <div class="row">
              <div class="col-lg-7">
                  <div class="cta-content">
                      <div class="divider mb-4"></div>
                      <h2 class="mb-5 text-lg">Chúng tôi hân hạnh cung cấp cho bạn <span class="title-color">cơ hội để có sức khỏe</span></h2>
                      <a href="appoinment.html" class="btn btn-main-2 btn-round-full">Đặt lịch<i class="icofont-simple-right  ml-2"></i></a>
                  </div>
              </div>
          </div>
      </div>
  </section>
@endsection
