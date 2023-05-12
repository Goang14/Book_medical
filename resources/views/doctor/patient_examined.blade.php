@extends('doctor.layouts.app')

@section('content-doctor')
<section class="mb-4">
    <div class="card">
        <div class="card-header text-center py-3">
            <h5 class="mb-0 text-center">
            <strong>Danh sách đã khám</strong>
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
                    @foreach ($dataPatientExamined as $key => $value)
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
    </div>
</section>
@endsection
