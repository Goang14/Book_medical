@extends('admin.layouts.app')

@section('content-admin')
<script>
    $(document).ready(function() {

     $('#example').dataTable({});

     } );
</script>
<section class="mb-4">
    <div class="card">
        <div class="card-header text-center py-3">
            <h5 class="mb-0 text-center">
            <strong>Quản Lí Phòng</strong>
            </h5>
            <div class="w-25">
                <button type="button" class="btn btn-primary d-flex"><a class="text-dark text-decoration-none" href="{{ url('admin/add_room') }}">Thêm Phòng</a></button>
            </div>
        </div>

        <div class="table-responsive">
            <table id="myTable" class="table table-striped b-t b-light" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Tên Phòng</th>
                        <th>Tên Khoa</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                    <tbody>
                        @foreach ($dataRoom as $key => $value )
                            <tr>
                                <td>{{ ++$key }}</td>
                                <td>{{ $value->name_room }}</td>
                                <td>{{ $value->department_name }}</td>
                                <td><a href="{{ url('admin/update_room/' . $value->room_id) }}"><i class="fa-regular fa-pen-to-square"></i></a></td>
                                <td><a href="" class="delete-room" data-id="{{ $value->room_id }}"><i class="fa-sharp fa-solid fa-trash"></i></a></td>
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
        $('.delete-room').click(function() {
            var roomID = $(this).data('id');
            if (confirm('Bạn có muốn chắc chắn xóa không?')) {
                $.ajax({
                    url: `delete/${roomID}`,
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

