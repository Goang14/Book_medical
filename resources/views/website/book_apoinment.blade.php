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
                                <label for="name">Bác sĩ</label>
                                <select class="form-control" id="doctor"  onchange="departmentDoctor()">
                                    <option>------Chọn bác sĩ------</option>
                                    @foreach ($dataDoctor as $key => $value )
                                        <option value="{{ $value->user_id }}">{{ $value->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="name">Khoa</label>
                                <select class="form-control" id="department">
                                    <option>------Chọn Khoa------</option>
                                    {{-- @foreach ($dataDepartment as $key => $value )
                                        <option value="{{ $value->id }}">{{ $value->department_name }}</option>
                                    @endforeach --}}
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="name">Họ tên:</label>
                            <input type="text" value="{{ $dataPatient->name }}" class="form-control" id="name" name="name" required>
                        </div>

                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" value="{{ $dataPatient->email }}" class="form-control" id="email" name="email" required>
                        </div>

                        <div class="form-group">
                            <label for="phone">Số điện thoại:</label>
                            <input type="tel" value="{{ $dataPatient->phone }}" class="form-control" id="phone" name="phone" required>
                        </div>

                        <div class="form-group">
                            <label for="address">Địa chỉ</label>
                            <input type="address" value="{{ $dataPatient->address }}" class="form-control" id="address" name="address" required>
                        </div>

                        <div class="row mt-3">
                            <label for="phone">Giới tính:</label>
                            <div class="form-group">
                                <select class="form-control" id="gender">
                                    {{-- <option>------Chọn giới tính------</option> --}}
                                    <option value="{{'Nam' ? 1 : 0}}">{{ $dataPatient->sex = 1 ? 'Nam' : 'Nữ' }}</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="name">Ngày Hẹn</label>
                            <select class="form-control" id="date_time">
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="time">Thời gian hẹn:</label>
                            <select class="form-control" id="time">
                                <option value="0">Sáng</option>
                                <option value="1">Chiều</option>
                            </select>
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


    $( document ).ready(function() {
        departmentDoctor();
    });

    function departmentDoctor() {
        let id = $('#doctor').val();
        let today = new Date();
        let date = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+ today.getDate();

        $.ajax({
            url: `departmentDoctor/${id}`,
            method: "GET",
            dataType: 'json',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(data) {
                let html = '';
                let time = '';
                data.forEach(function(value,index){
                    html = `${html}<option value="${value.department_id}">${value.department_name}</option>`
                    time = `${time}<option value="${value.onAll_day}">${value.onAll_day}</option>`
                })
                $('#department').html(html);
                $('#date_time').html(time);
            }
        })
    }
    function addBookApoinment(){
        loadPage(true)
        let department = $('#department').val();
        let doctor = $('#doctor').val();
        let name = $('#name').val();
        let email = $('#email').val();
        let phone = $('#phone').val();
        let gender = $('#gender').val();
        let address = $('#address').val();
        let appointment_date = $('#date_time').val();
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
        loadPage(false)
    }
</script>
