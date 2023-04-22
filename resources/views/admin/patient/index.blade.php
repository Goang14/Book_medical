@extends('admin.layouts.app')

@section('content-admin')
<section class="mb-4">
    <div class="card">
        <div class="card-header text-center py-3">
            <h5 class="mb-0 text-center">
            <strong>Quản Lí Bệnh Nhân</strong>
            </h5>
            {{-- <div class="w-25">
                <button type="button" class="btn btn-primary d-flex"><a class="text-dark text-decoration-none" href="{{ url('admin/add_room') }}">Thêm Phòng</a></button>
            </div> --}}
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
                                <td>{{ $value->sex }}</td>
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
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                        <i class="fa-solid fa-eye"></i>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
            </table>
        </div>
  </section>

  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Thông tin bệnh nhân</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="form-group mt-4">
                <label for="address">Tên bệnh nhân</label>
                <input type="address" value="{{ $data->name_patient ?? '' }}" class="form-control" id="address" name="address" required disabled>
            </div>
            <div class="form-group mt-4">
                <label for="address">Tên Ngày sinh</label>
                <input type="address" value="{{ $data->birth_day ?? '' }}" class="form-control" id="address" name="address" required disabled>
            </div>
            <div class="form-group mt-4">
                <label for="address">Giới tính</label>
                <input type="address" value="{{ $data->sex ?? ''}}" class="form-control" id="address" name="address" required disabled>
            </div>
            <div class="form-group mt-4">
                <label for="address">Số điện thoại</label>
                <input type="address" value="{{ $data->phone ?? '' }}" class="form-control" id="address" name="address" required disabled>
            </div>
            <div class="form-group mt-4">
                <label for="address">Ngày đặt lịch</label>
                <input type="address" value="{{ $data->appointment_date ?? '' }}" class="form-control" id="address" name="address" required disabled>
            </div>
            <div class="form-group mt-4">
                <label for="address">Thời gian khám</label>
                <input type="address" value="{{ $data->appointment_time ?? '' }}" class="form-control" id="address" name="address" required disabled>
            </div>
            <div class="form-group mt-4">
                <label for="address">Trạng thái</label>
                <input type="address" value="{{ $data->status ?? '' }}" class="form-control" id="address" name="address" required disabled>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
@endsection
