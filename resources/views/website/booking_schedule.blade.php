@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="text-center">Lịch đặt khám bệnh</h1>
        <table class="table table-bordered">
        <thead>
            <tr>
            <th>STT</th>
            <th>Ngày</th>
            <th>Buổi</th>
            <th>Tên bệnh nhân</th>
            <th>Điện thoại</th>
            <th>Email</th>
            <th>Trạng thái</th>
            </tr>
        </thead>

        @foreach ($data as $key => $value )
            <tbody>
                <tr>
                    <td>{{ ++$key }}</td>
                    <td>{{ date('d-m-Y', strtotime($value->appointment_date))}}</td>
                    @if($value->appointment_time == 0)
                        <td>Buổi sáng</td>
                    @elseif($value->appointment_time == 1)
                        <td>Buổi Chiểu</td>
                    @endif
                    <td>{{ $value->name_patient }}</td>
                    <td>{{ $value->phone }}</td>
                    <td>{{ $value->email }}</td>
                    @if($value->status == 0)
                        <td class="text-success">Chưa khám</td>
                    @elseif($value->status == 1)
                        <td class="text-danger">Đã khám</td>
                    @endif
                    <td>
                        <button type="button" class="btn btn-danger" id="delete_schedule" data-id="{{ $value->id }}" onclick="deleteSchedule()">Hủy</button>
                        <button
                            data-id="{{ $value->id }}" data-name="{{ $value->name_patient }}" data-date_time="{{ $value->appointment_date}}" data-time="{{ $value->appointment_time}}"
                            data-phone="{{ $value->phone }}" data-email="{{ $value->email }}"
                            type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            Chi tiết
                        </button>
                    </td>
                </tr>
            </tbody>
        @endforeach
        </table>
    </div>

      <!-- Modal -->
      <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Chi tiết lịch khám</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="form-group ">
                        <label for="name">Tên Bệnh Nhân</label>
                        <input type="text" class="form-control" id="name" name="name" required disabled>
                    </div>
                    <div class="form-group">
                        <label for="date_time">Ngày Khám</label>
                        <input type="date_time" class="form-control" id="date_time" name="date_time" required disabled >
                    </div>
                    <div class="form-group">
                        <label for="time">Giờ Khám</label>
                        <input type="text" class="form-control" id="time" name="time" required disabled >
                    </div>
                    <div class="form-group">
                        <label for="phone">Điện Thoại</label>
                        <input type="phone" class="form-control" id="phone" name="phone" required disabled >
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" required disabled>
                    </div>
                    <p><strong>Tổng tiền:</strong> &nbsp; 10000 VND</p>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Thoát</button>
              <button type="button" class="btn btn-primary">Thanh Toán</button>
            </div>
          </div>
        </div>
      </div>
@endsection
<script src="{{ asset('js/jquery-3.6.1.min.js') }}"></script>

<script>
    $(document).ready(function() {
        $('#exampleModal').on('show.bs.modal', function(e) {
            let id = $(e.relatedTarget).data('id');
            let name = $(e.relatedTarget).data('name');
            let date_time = $(e.relatedTarget).data('date_time');
            let time = $(e.relatedTarget).data('time');
            let phone = $(e.relatedTarget).data('phone');
            let email = $(e.relatedTarget).data('email');

            if(time==0){
                session ="Buổi sáng"
            }if(time==1){
                session ="Buổi chiểu"
            }
            $('#id').val(id);
            $('#name').val(name);
            $('#phone').val(phone);
            $('#email').val(email);
            $('#date_time').val(date_time);
            $('#time').val(session);

        });
    })

    function deleteSchedule(){
        var id = $('#delete_schedule').data('id');
        console.log(id);
        $.ajax({
            url: `delete/${id}`,
            type: 'post',
            data:{
                _token: '{!! csrf_token() !!}',
            },
            success: function(data) {
                if (data.status == 200) {
                    alert("Bạn có muốn hủy nó không?");
                    window.location.href  = 'booking_schedule';
                }
            },
        })
   }
</script>

