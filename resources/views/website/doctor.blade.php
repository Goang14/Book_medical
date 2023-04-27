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

        {{-- <div class="col-12 text-center  mb-5">
              <div class="btn-group btn-group-toggle " data-toggle="buttons">
                <label class="btn active ">
                  <input type="radio" name="shuffle-filter" value="all" checked="checked" />All Department
                </label>
                <label class="btn ">
                  <input type="radio" name="shuffle-filter" value="cat1" />Cardiology
                </label>
                <label class="btn">
                  <input type="radio" name="shuffle-filter" value="cat2" />Dental
                </label>
                <label class="btn">
                  <input type="radio" name="shuffle-filter" value="cat3" />Neurology
                </label>
                <label class="btn">
                  <input type="radio" name="shuffle-filter" value="cat4" />Medicine
                </label>
                 <label class="btn">
                  <input type="radio" name="shuffle-filter" value="cat5" />Pediatric
                </label>
                <label class="btn">
                  <input type="radio" name="shuffle-filter" value="cat6" />Traumatology
                </label>
              </div>
        </div> --}}

      <div class="row shuffle-wrapper portfolio-gallery">
            <div class="col-lg-3 col-sm-6 col-md-6 mb-4 shuffle-item" data-groups="[&quot;cat1&quot;,&quot;cat2&quot;]">
                @foreach ($doctor as $value )
                    <div class="position-relative doctor-inner-box">
                        <div class="doctor-profile">
                            <div class="doctor-img p-3">
                                <img src="{{ asset('storage/avatar/' . $value->image) }}" alt="doctor-image" class="img-fluid w-100">
                            </div>
                        </div>
                        <div class="content mt-3">
                            <h4 class="mb-0">{{ $value->name }}</h4>
                            <p>{{ $value->department_name }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
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
                      <h2 class="mb-5 text-lg">We are pleased to offer you the <span class="title-color">chance to have the healthy</span></h2>
                      <a href="appoinment.html" class="btn btn-main-2 btn-round-full">Get appoinment<i class="icofont-simple-right  ml-2"></i></a>
                  </div>
              </div>
          </div>
      </div>
  </section>
@endsection
