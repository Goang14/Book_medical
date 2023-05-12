@extends('admin.layouts.app')

@section('content-admin')
<section class="mb-4">
    <div class="card">
        <div class="card-header text-center py-3">
            <h5 class="mb-0 text-center">
            <strong>Quản Lí Lịch trực</strong>
            </h5>
            <div class="w-25">
                <button type="button" class="btn btn-primary d-flex"><a class="text-dark text-decoration-none" href="{{ url('admin/add_on_call_schedule') }}">Thêm lịch trực</a></button>
            </div>
        </div>
        <div class="table-responsive">
            <table id="myTable" class="table table-striped b-t b-light" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Tên bác sĩ</th>
                        <th>Ngày trực</th>
                        <th>Thời gian trực</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                    <tbody>
                        @foreach ($dataOncallSchedule as $key => $value)
                            <tr>
                                <td>{{ ++$key }}</td>
                                <td>{{ $value->name }}</td>
                                <td>{{ $value->onAll_day }}</td>
                                @if($value->session == 1)
                                    <td>Sáng</td>
                                @elseif($value->session == 0)
                                    <td>Chiều</td>
                                @endif
                                <td><a href="{{ url('admin/getDataUpdate/' .$value->id) }}"><i class="fa-regular fa-pen-to-square"></i></a></td>
                                <td><a href="" class="delete-oncall" data-id="{{ $value->id }}"><i class="fa-sharp fa-solid fa-trash"></i></a></td>
                            </tr>
                        @endforeach
                    </tbody>
            </table>
        </div>
  </section>
@endsection
<script src="{{ asset('js/jquery-3.6.1.min.js') }}"></script>
<script>
 $(document).ready(function() {
        $('.delete-oncall').click(function() {
            var oncallID = $(this).data('id');
            if (confirm('Bạn có muốn chắc chắn xóa không?')) {
                $.ajax({
                    url: `deleteOncall/${oncallID}`,
                    type: 'DELETE',
                    data: {
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        if (response.success) {
                            alert('deleted successfully');
                        } else {
                            alert('Error deleting room');
                        }
                    },
                });
            }
        });
    });
</script>
