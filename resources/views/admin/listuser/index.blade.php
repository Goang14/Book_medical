@extends('admin.layouts.app')

@section('content-admin')
<section class="mb-4">
    <div class="card">
      <div class="card-header text-center py-3">
        <h5 class="mb-0 text-center">
          <strong>Quản Lí Tài Khoản</strong>
        </h5>
        <div class="w-25">
            <button type="button" class="btn btn-primary d-flex"><a class="text-dark text-decoration-none" href="{{ url('admin/add_department') }}">Thêm Bác Sĩ</a></button>
        </div>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-hover">
            <thead>
              <tr>
                <th scope="col"></th>
                <th scope="col">Tên Bác Sĩ</th>
                <th scope="col">Ngày sinh</th>
                <th scope="col">Số điện thoại</th>
                <th scope="col">Email</th>
                <th scope="col">Khoa</th>
                <th scope="col">Địa chỉ</th>
                <th scope="col">Avatar</th>
                <th scope="col">Room</th>
                <th scope="col">Trình độ</th>
                <th scope="col"></th>
                <th scope="col"></th>
              </tr>
            </thead>
                <tbody>
                    <tr>
                    </tr>
                </tbody>
          </table>
        </div>
      </div>
    </div>
  </section>
@endsection
