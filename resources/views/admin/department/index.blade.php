@extends('admin.layouts.app')

@section('content-admin')
<section class="mb-4">
    <div class="card">
      <div class="card-header text-center py-3">
        <h5 class="mb-0 text-center">
          <strong>Quản Lí Khoa</strong>
        </h5>
        <div class="w-25">
            <button type="button" class="btn btn-primary d-flex"><a class="text-dark text-decoration-none" href="{{ url('admin/add_department') }}">Thêm khoa</a></button>
        </div>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table id="myTable" class="table table-hover">
            <thead>
              <tr>
                <th scope="col"></th>
                <th scope="col">Tên Khoa</th>
                <th scope="col" class="w-50">Mô tả</th>
                <th scope="col">Hình ảnh</th>
                <th scope="col"></th>
                <th scope="col"></th>
              </tr>
            </thead>
                <tbody>
                    @foreach ($department as $key => $value )
                        <tr>
                            <td scope="row">{{ ++$key }}</td>
                            <td>{{ $value->department_name }}</td>
                            <td>{{ $value->description }}</td>
                            <td><img src="{{ asset('storage/department/' . $value->image) }}" alt="" class="img-fluid" width="100px" height="100px"></td>
                            <td><a href="{{ url('admin/update_department/' .$value->id) }}"><i class="fa-regular fa-pen-to-square"></i></a></td>
                            <td><a href="" class="delete-department" data-id="{{ $value->id }}"><i class="fa-sharp fa-solid fa-trash"></i></a></td>
                        </tr>
                    @endforeach
                </tbody>
          </table>
        </div>
      </div>
    </div>
  </section>
@endsection
<style>

</style>
<script src="{{ asset('js/jquery-3.6.1.min.js') }}"></script>
<script>
 $(document).ready(function() {
        $('.delete-department').click(function() {
            var departmentID = $(this).data('id');
            if (confirm('Bạn có muốn chắc chắn xóa không?')) {
                $.ajax({
                    url: `delete/${departmentID}`,
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
