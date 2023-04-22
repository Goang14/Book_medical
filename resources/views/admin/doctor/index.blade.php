@extends('admin.layouts.app')

@section('content-admin')
<section class="mb-4">
    <div class="card">
      <div class="card-header text-center py-3">
        <h5 class="mb-0 text-center">
          <strong>Quản Lí Bác Sĩ</strong>
        </h5>
        <div class="w-25">
            <button type="button" class="btn btn-primary d-flex"><a class="text-dark text-decoration-none" href="{{ url('admin/create-doctor') }}">Thêm Bác sĩ</a></button>
        </div>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table id="myTable" class="table table-hover text-nowrap">
            <thead>
              <tr>
                <th scope="col">STT</th>
                <th scope="col">Tên Bác Sĩ</th>
                <th scope="col">Học vị</th>
                <th scope="col">Ngày sinh</th>
                <th scope="col">Địa chỉ</th>
                <th scope="col">Số điện thoại</th>
                <th scope="col">Tên Khoa</th>
                <th scope="col">Phòng làm việc</th>
                <th></th>
                <th></th>
              </tr>
            </thead>
                <tbody>
                    @foreach ($dataDoctor as $key => $value)
                        <tr>
                            <td scope="row">{{ ++$key }}</td>
                            <td>{{ $value->name_doctor }}</td>
                            <td>{{ $value->name_degree }}</td>
                            <td>{{ $value->birth_day }}</td>
                            <td>{{ $value->address }}</td>
                            <td>{{ $value->phone }}</td>
                            <td>{{ $value->department_name }}</td>
                            <td>{{ $value->name_room }}</td>
                            <td><a href="{{ url('admin/update_doctor/'. $value->id_doctor) }}"><i class="fa-regular fa-pen-to-square"></i></a></td>
                            <td><a href="" class="delete-user" data-id="{{ $value->user_id }}"><i class="fa-sharp fa-solid fa-trash"></i></a></td>
                        </tr>
                    @endforeach
                </tbody>
          </table>
        </div>
      </div>
    </div>
  </section>
@endsection
<script src="{{ asset('js/jquery-3.6.1.min.js') }}"></script>
<script>
 $(document).ready(function() {
        $('.delete-user').click(function() {
            var userId = $(this).data('id');
            if (confirm('Are you sure you want to delete this user and all related doctors?')) {
                $.ajax({
                    url: `delete/${userId}`,
                    type: 'DELETE',
                    data: {
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        if (response.success) {
                            alert('User deleted successfully');
                        } else {
                            alert('Error deleting user');
                        }
                    },
                    error: function() {
                        alert('Error deleting user');
                    }
                });
            }
        });
    });
</script>
