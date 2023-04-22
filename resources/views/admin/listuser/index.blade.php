@extends('admin.layouts.app')

@section('content-admin')
<section class="mb-4">
      <div class="card-header text-center py-3">
        <h5 class="mb-0 text-center">
          <strong>Quản Lí Tài Khoản</strong>
        </h5>
      </div>
      <div class="table-responsive mt-5">
        <table id="myTable" class="table table-striped b-t b-light" class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Họ và tên</th>
                    <th>Email</th>
                    <th>Số điện thoại</th>
                    <th>Phân quyền</th>
                    <th></th>
                </tr>
            </thead>
                <tbody>
                    @foreach ($dataUser as $key => $value)
                        <tr>
                            <td>{{ ++$key }}</td>
                            <td>{{ $value->name }}</td>
                            <td>{{ $value->email }}</td>
                            <td>{{ $value->phone }}</td>
                            @if($value->role == 0)
                                <td>Admin</td>
                            @elseif($value->role == 1)
                                <td>User</td>
                            @elseif($value->role == 2)
                                <td>Doctor</td>
                            @endif
                        </tr>
                    @endforeach
                </tbody>
        </table>
    </div>
  </section>
@endsection
