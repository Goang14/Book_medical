@extends('doctor.layouts.app')

@section('content-doctor')
<section class="mb-4">
    <div class="card">
        <div class="card-header text-center py-3">
            <h5 class="mb-0 text-center">
            <strong>Quản Lí Bệnh Nhân</strong>
            </h5>
        </div>
        <div class="table-responsive mt-5">
            <table id="myTable" class="table table-striped b-t b-light" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Tên bệnh nhân</th>
                        <th>Tên Ngày sinh</th>
                        <th>Giới tính</th>
                        <th>Số điện thoại</th>
                        <th>Ngày đặt lịch</th>
                        <th>Thời gian khám</th>
                        <th>Trạng thái</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($dataPatient as $key => $value)
                    <tr>
                        <td>{{ ++$key }}</td>
                        <td>{{ $value->name_patient }}</td>
                        <td>{{ $value->birth_day }}</td>
                        @if($value->sex == 0)
                            <td>Nam</td>
                        @elseif($value->sex == 1)
                            <td>Nữ</td>
                        @endif
                        <td>{{ $value->phone }}</td>
                        <td>{{ $value->appointment_date }}</td>
                        <td>{{ $value->appointment_time }}</td>
                        @if($value->status == 0)
                            <td>Chưa khám</td>
                        @elseif($value->status == 1)
                            <td>Đã khám</td>
                        @elseif($value->status == 2)
                            <td>Quá hạn</td>
                        @endif
                        <td>
                            <button
                                data-id="{{$value->schedule_id}}" data-name="{{ $value->name_patient }}"
                                data-birth_day="{{$value->birth_day}}" data-sex="{{ $value->sex }}"
                                data-phone="{{$value->phone}}" data-appointment_date="{{ $value->appointment_date }}"
                                data-appointment_time="{{$value->appointment_time}}" data-status="{{ $value->status }}"
                                type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                <i class="fa-solid fa-eye"></i>
                            </button>
                        </td>
                        <input type="hidden" id="id_patient" data-id="{{$value->schedule_id}}" >
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <input type="hidden" id="id">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Thông tin bệnh nhân</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mt-4">
                            <label for="name">Tên bệnh nhân</label>
                            <input type="name" class="form-control" id="name" name="name" required disabled>
                        </div>
                        <div class="form-group mt-4">
                            <label for="birth_day">Tên Ngày sinh</label>
                            <input type="birth_day" class="form-control" id="birth_day" name="birth_day" required disabled>
                        </div>
                        <div class="form-group mt-4">
                            <label for="sex">Giới tính</label>
                            <input type="sex"  class="form-control" id="sex" name="sex" required disabled>
                        </div>
                        <div class="form-group mt-4">
                            <label for="phone">Số điện thoại</label>
                            <input type="phone" class="form-control" id="phone" name="phone" required disabled>
                        </div>
                        <div class="form-group mt-4">
                            <label for="appointment_date">Ngày đặt lịch</label>
                            <input type="appointment_date" class="form-control" id="appointment_date" name="appointment_date" required disabled>
                        </div>
                        <div class="form-group mt-4">
                            <label for="appointment_time">Thời gian khám</label>
                            <input type="appointment_time" class="form-control" id="appointment_time" name="appointment_time" required disabled>
                        </div>
                        <div class="form-group mt-4">
                            <label for="address">Trạng thái</label>
                            <select class="form-select" name="" id="status">
                                @if($value->status == 0)
                                    <option value="0" selected>Chưa khám</option>
                                    <option value="1" >Đã khám</option>
                                @else
                                    <option value="0">Chưa khám</option>
                                    <option value="1" selected>Đã khám</option>
                                @endif
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button id="upadte_patient" type="button" class="btn btn-secondary" data-bs-dismiss="modal">Update</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
  </section>
@endsection

<script src="{{ asset('js/jquery-3.6.1.min.js') }}"></script>
<script>
    $(document).ready(function() {
        $('#upadte_patient').click(function() {
            let id = $('#id_patient').data('id');
            console.log(id);
            let status = $("#status").val();
            console.log(status);
            $.ajax({
                url: 'update_patient',
                type: 'Post',
                data: {
                    status: status,
                    id: id,
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    if (response.success) {
                        alert('Xóa thành công');
                    } else {
                        alert('Error deleting user');
                    }
                },
                error: function() {
                    alert('Error deleting user');
                }
            });
        });

        $('#exampleModal').on('show.bs.modal', function(e) {
            let id = $(e.relatedTarget).data('id');
            let name_patient = $(e.relatedTarget).data('name');
            let birth_day = $(e.relatedTarget).data('birth_day');
            let sex = $(e.relatedTarget).data('sex');
            let phone = $(e.relatedTarget).data('phone');
            let appointment_date = $(e.relatedTarget).data('appointment_date');
            let appointment_time = $(e.relatedTarget).data('appointment_time');
            let status = $(e.relatedTarget).data('status');
            let test = '';
            if(sex == 0){
                test = 'Nam'
            }else if(sex == 1){
                test = 'Nữ'
            }
            $("#id").val(id);
            $("#name").val(name_patient);
            $("#birth_day").val(birth_day);
            $("#appointment_date").val(appointment_date);
            $("#phone").val(phone);
            $("#sex").val(test);
            $("#appointment_time").val(appointment_time);
            $(`#status  option[value="${status}"]`).prop("selected", true);
        })
    });
</script>
