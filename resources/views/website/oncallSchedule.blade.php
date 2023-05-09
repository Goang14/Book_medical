@extends('layouts.app')

@section('content')

<div class="s009">
    <div class="container">
        <a class="title back ">Chọn bác sĩ &nbsp; &nbsp; </a> <i class="fas fa-angle-right title"></i> <a class="title"> &nbsp; &nbsp;Bác sĩ</a>
        <div class="row justify-content-center">
            <script type="text/javascript">
                $(document).ready(function() {
                    $('.back').click(function() {
                        parent.history.back();
                        return false;
                    });
                });
            </script>
            <div class="col-lg-6">
                <div class="section-tittle text-center mb-100">
                    <div class="card mb-3" style="max-width: 540px;">
                        <div class="row g-0">
                            <div class="col-md-4">
                            <img height="200" width="200" src="{{ asset('storage/avatar/'. $dayOnCall->image) }}" alt="...">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title">{{($dayOnCall->name_degree)}}</h5>
                                    <p class="card-text">{{($dayOnCall->name)}}</p>
                                    <p class="card-text">{{($dayOnCall->department_name)}}</p>
                                    <p class="card-text"><span>Phòng trực: </span> {{($dayOnCall->name_room)}}</p>
                                    <p id="date"></p>
                                </div>
                            </div>
                            <hr>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="section-tittle text-center ">
            <h2>Ca trực</h2>
            @foreach($oncall as $key => $value)
                @if(!empty($value))
                    <button type="button" class="btn btn-dark" data-day="{{ $value->onAll_day }}" data-time="{{ $value->session }}" data-name="{{ $value->name }}" data-department="{{ $value->department_name }}" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        {{ $value->onAll_day }}
                    </button>
                @else
                    <h1>Không có lịch trực</h1>
                @endif
            @endforeach
        </div>
    </div>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Đặt lịch hẹn</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
            <div class="appoinment-wrap mt-3">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="doctor">Bác sĩ</label>
                                <input type="text" value="" class="form-control" id="doctor" name="doctor" required disabled>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="department">Khoa</label>
                                <input type="text" value="" class="form-control" id="department" name="department" required disabled>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="name">Họ tên:</label>
                            <input type="text" value="" class="form-control" id="name" name="name" required>
                        </div>

                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" value="" class="form-control" id="email" name="email" required>
                        </div>

                        <div class="form-group">
                            <label for="phone">Số điện thoại:</label>
                            <input type="tel" value="" class="form-control" id="phone" name="phone" required>
                        </div>

                        <div class="form-group">
                            <label for="address">Địa chỉ</label>
                            <input type="address" value="" class="form-control" id="address" name="address" required>
                        </div>

                        <div class="col-12">
                            <label for="phone">Giới tính:</label>
                            <div class="form-group">
                                <select class="form-control" id="gender">
                                    <option>------Chọn giới tính------</option>
                                    <option value="0">Nữ</option>
                                    <option value="1">Nam</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="name">Ngày Hẹn</label>
                            <input type="text" value="" class="form-control" id="date_time" name="date_time" required disabled>
                        </div>

                        <div class="form-group">
                            <label for="time">Thời gian hẹn:</label>
                            <input type="text" class="form-control" id="time" name="time" required disabled>
                        </div>

                        <div class="form-group">
                            <label for="note">Ghi chú</label>
                            <input type="text" class="form-control" id="note" name="note" required>
                        </div>
                        <button type="submit" class="btn btn-primary w-25 mx-auto " onclick="addBookApoinmentDepartment()"> Đặt lịch</button>
                    </div>
                </div>
            </div>
      </div>
    </div>
  </div>
</div>
@endsection
<script src="{{ asset('js/jquery-3.6.1.min.js') }}"></script>

<script type="text/javascript">
    $(document).ready(function(){
        $('#exampleModal').on('show.bs.modal', function(e) {
            let department_name = $(e.relatedTarget).data('department');
            let day = $(e.relatedTarget).data('day');
            let name_doctor = $(e.relatedTarget).data('name');
            let time = $(e.relatedTarget).data('time');
            let session =''
            $("#doctor").val(name_doctor);
            $("#department").val(department_name);
            $("#date_time").val(day);
            if(time==0){
                session ="Buổi sáng"
            }if(time==1){
                session ="Buổi chiểu"
            }
            $("#time").val(session);
        })
    })
    function addBookApoinmentDepartment(){
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
            url: '../addBookApointment',
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
                    alert("Bạn đã đặt lịch thành công.");
                }
            },
            error: function(errors) {
                alert("Error")
            }
        })
        loadPage(false)
    }
</script>



