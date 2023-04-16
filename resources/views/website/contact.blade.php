@extends('layouts.app')

@section('content')
<section class="page-title bg-1">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="block text-center">
            <span class="text-white">Liên hệ chúng tôi</span>
            <h1 class="text-capitalize mb-5 text-lg">Liên Lạc</h1>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- contact form start -->

  <section class="section contact-info pb-0">
      <div class="container">
           <div class="row">
              <div class="col-lg-4 col-sm-6 col-md-6">
                  <div class="contact-block mb-4 mb-lg-0">
                      <i class="icofont-live-support"></i>
                      <h5>Call Us</h5>
                       +(84) 355679214
                  </div>
              </div>
              <div class="col-lg-4 col-sm-6 col-md-6">
                  <div class="contact-block mb-4 mb-lg-0">
                      <i class="icofont-support-faq"></i>
                      <h5>Email Us</h5>
                       legendht1411@mail.com
                  </div>
              </div>
              <div class="col-lg-4 col-sm-6 col-md-6">
                  <div class="contact-block mb-4 mb-lg-0">
                      <i class="icofont-location-pin"></i>
                      <h5>Location</h5>
                       Vinh - Nghệ An
                  </div>
              </div>
          </div>
      </div>
  </section>

  <section class="contact-form-wrap section">
      <div class="container">
          <div class="row justify-content-center">
              <div class="col-lg-6">
                  <div class="section-title text-center">
                      <h2 class="text-md mb-2">Liên hệ chúng tôi</h2>
                      <div class="divider mx-auto my-4"></div>
                  </div>
              </div>
          </div>
          <div class="row">
              <div class="col-lg-12 col-md-12 col-sm-12">
                  <form id="contact-form" class="contact__form " method="post" action="mail.php">
                   <!-- form message -->
                      <div class="row">
                          <div class="col-12">
                              <div class="alert alert-success contact__msg" style="display: none" role="alert">
                                Thông điệp của bạn đã được gửi thành công.
                              </div>
                          </div>
                      </div>

                      <div class="row">
                          <div class="col-lg-6">
                              <div class="form-group">
                                  <input name="name" id="name" type="text" class="form-control" placeholder="Your Full Name" >
                              </div>
                          </div>

                          <div class="col-lg-6">
                              <div class="form-group">
                                  <input name="email" id="email" type="email" class="form-control" placeholder="Your Email Address">
                              </div>
                          </div>
                           <div class="col-lg-6">
                              <div class="form-group">
                                  <input name="subject" id="subject" type="text" class="form-control" placeholder="Your Query Topic">
                              </div>
                          </div>
                           <div class="col-lg-6">
                              <div class="form-group">
                                  <input name="phone" id="phone" type="text" class="form-control" placeholder="Your Phone Number">
                              </div>
                          </div>
                      </div>

                      <div class="form-group-2 mb-4">
                          <textarea name="message" id="message" class="form-control" rows="8" placeholder="Your Message"></textarea>
                      </div>

                      <div class="text-center">
                          <input class="btn btn-main btn-round-full" name="submit" type="submit" value="Send Messege"></input>
                      </div>
                  </form>
              </div>
          </div>
      </div>
  </section>


   <div class="google-map ">
      <div id="map"></div>
  </div>
@endsection
