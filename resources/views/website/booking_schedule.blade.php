@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="text-center">Lịch đặt khám bệnh</h1>
        <table class="table table-bordered">
        <thead>
            <tr>
            <th>STT</th>
            <th>Ngày</th>
            <th>Giờ</th>
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
                    <td>{{ $value->appointment_date }}</td>
                    <td>{{ $value->appointment_time }}</td>
                    <td>{{ $value->name_patient }}</td>
                    <td>{{ $value->phone }}</td>
                    <td>{{ $value->email }}</td>
                    @if($value->status == 0)
                        <td class="text-success">Chưa khám</td>
                    @elseif($value->status == 1)
                        <td class="text-danger">Đã khám</td>
                    @endif
                    <td><button type="button" class="btn btn-danger" id="delete_schedule" data-id="{{ $value->id }}" onclick="deleteSchedule()">Hủy</button></td>
                </tr>
            </tbody>
        @endforeach
        </table>
    </div>
@endsection
<script src="{{ asset('js/jquery-3.6.1.min.js') }}"></script>

<script>

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
                    $.notify("Xóa cửa hàng thành công", "success");
                }
            },
        })
   }
</script>

