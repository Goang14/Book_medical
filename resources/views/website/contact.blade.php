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
            <div class="row shadow-sm p-5 mb-5 bg-white rounded">
                <div class="col-lg-12 col-md-12 col-sm-12">
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
                                <input name="name" id="name" type="text" class="form-control" placeholder="Họ và tên" >
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group">
                                <input name="email" id="email" type="email" class="form-control" placeholder="Email">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <input name="topic" id="topic" type="text" class="form-control" placeholder="Chủ đề">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <input name="phone" id="phone" type="text" class="form-control" placeholder="Số điện thoại">
                            </div>
                        </div>
                    </div>

                    <div class="form-group-2 mb-4">
                        <textarea name="message" id="message" class="form-control" rows="8" placeholder="Tin nhắn"></textarea>
                    </div>

                    <div class="text-center">
                        <button class="btn btn-dark btn-round-full" name="submit" onclick="sendMessege()" type="submit">
                         Gửi
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

<script>
    function sendMessege(){
        let name = $('#name').val();
        let email = $('#email').val();
        let topic = $('#topic').val();
        let phone = $('#phone').val();
        let message = $('#message').val();
        // let formData = new FormData();
        // formData.append('name', name);
        // formData.append('email', email);
        // formData.append('subject', subject);
        // formData.append('phone', phone);
        // formData.append('message', message);
        $.ajax({
            type: 'POST',
            url: 'send_contact',
            data: {
                name:name,
                email:email,
                topic:topic,
                phone:phone,
                message:message
            },
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(data) {
                if (data.status == 200) {
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Bạn đã gửi thành công',
                        showConfirmButton: false,
                        timer: 1500
                    })
                    window.location.href  = config.routes.home;
                }
            },
        })
    }
</script>
