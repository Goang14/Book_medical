@extends('layouts.app')

@section('content')
<section class="page-title bg-1">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="block text-center">
            <span class="text-white">Đặt chỗ</span>
            <h1 class="text-capitalize mb-5 text-lg">Đặt lịch</h1>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="appoinment section">
    <div class="container">
      <div class="row">
        <div class="col-lg-4">
            <div class="mt-3">
              <div class="feature-icon mb-3">
                <i class="icofont-support text-lg"></i>
              </div>
               <span class="h3">Gọi dịch vụ khẩn cấp!</span>
                <h2 class="text-color mt-3">+(84) 355679214 </h2>
            </div>
        </div>

        <div class="col-lg-8">
            <div class="appoinment-wrap mt-5 mt-lg-0 pl-lg-5 shadow-sm p-5 mb-5 bg-white rounded">
                    <h2 class="mb-2 title-color">Đặt lịch hẹn</h2>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <select class="form-control" id="department">
                                    <option>------Chọn Khoa------</option>
                                    @foreach ($dataDepartment as $key => $value )
                                        <option value="{{ $value->id }}">{{ $value->department_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <select class="form-control" id="doctor">
                                    <option>------Chọn bác sĩ------</option>
                                    @foreach ($dataDoctor as $key => $value )
                                        <option value="{{ $value->name }}">{{ $value->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="name">Họ tên:</label>
                            <input type="text" value="{{ $dataUser->name }}" class="form-control" id="name" name="name" required>
                        </div>

                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" value="{{ $dataUser->email }}" class="form-control" id="email" name="email" required>
                        </div>

                        <div class="form-group">
                            <label for="phone">Số điện thoại:</label>
                            <input type="tel" value="{{ $dataUser->phone }}" class="form-control" id="phone" name="phone" required>
                        </div>

                         <label for="phone">Giới tính:</label>
                        <div class="row mt-3">
                            <div class="form-group">
                                <select class="form-control" id="gender">
                                    <option>------Chọn giới tính------</option>
                                    <option value="0">Nam</option>
                                    <option value="1">Nữ</option>
                                </select>
                            </div>
                            {{-- <div class="form-check col-4 ps-5">
                                <input class="form-check-input" value="1" type="radio" name="gender" id="male" value="male" checked>
                                <label class="form-check-label" for="male">Male</label>
                            </div>
                            <div class="form-check col-4">
                                <input class="form-check-input" value="0" type="radio" name="gender" id="female" value="female">
                                <label class="form-check-label" for="female">Female</label>
                            </div> --}}
                        </div>

                        <div class="form-group mt-4">
                            <label for="address">Địa chỉ</label>
                            <input type="address" value="{{ $dataUser->address }}" class="form-control" id="address" name="address" required>
                        </div>

                        <div class="form-group">
                            <label for="date">Ngày hẹn:</label>
                            <input type="date" class="form-control" id="date" name="date" required>
                        </div>

                        <div class="form-group">
                            <label for="time">Thời gian hẹn:</label>
                            <input type="time" class="form-control" id="time" name="time" required>
                        </div>

                        <div class="form-group">
                            <label for="note">Ghi chú</label>
                            <input type="text" class="form-control" id="note" name="note" required>
                        </div>

                        <button type="submit" class="btn btn-primary" onclick="addBookApoinment()"> Đặt lịch</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection


<script src="{{ asset('js/jquery-3.6.1.min.js') }}"></script>

<script>

    let config = {
            routes: {
                home: "{{ asset("")}}",
            }
    };
    function addBookApoinment(){
        console.log( $('#gender').val());
        let department = $('#department').val();
        let doctor = $('#doctor').val();
        let name = $('#name').val();
        let email = $('#email').val();
        let phone = $('#phone').val();
        let gender = $('#gender').val();
        let address = $('#address').val();
        let appointment_date = $('#date').val();
        let appointment_time = $('#time').val();
        let note = $('#note').val();
        let status = 0;

        $.ajax({
            type: 'POST',
            url: 'addBookApointment',
            data: {
                department: department,
                doctor: doctor,
                name: name,
                email: email,
                phone: phone,
                gender: gender,
                address: address,
                appointment_date: appointment_date,
                appointment_time: appointment_time,
                note: note,
                status:status,
            },
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(data) {
                if (data.status == 200) {
                    alert("Bạn đã thêm thành công.");
                    window.location.href  = config.routes.home;
                }
            },
            error: function(errors) {
                alert("Error")
            }
        })
    }


</script>
