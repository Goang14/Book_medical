<?php
    use Carbon\Carbon;
?>

@extends('doctor.layouts.app')

@section('content-doctor')
<section class="mb-4">
    <div class="card">
      <div class="card-header text-center py-3">
        <h5 class="mb-0 text-center">
          <strong>Lịch trực</strong>
        </h5>
      </div>
      <div class="card-body">
        <div class="table-responsive">
            <table id="myTable" class="table table-hover text-nowrap">
                <thead>
                    <tr>
                        <th scope="col">STT</th>
                        <th scope="col">Tên Bác Sĩ</th>
                        <th scope="col">Học vị</th>
                        <th scope="col">Ngày trực</th>
                        <th scope="col">Buổi trực</th>
                        <th scope="col">Phòng làm việc</th>
                        <th></th>
                    </tr>
                </thead>
                <?php
                    $now = Carbon::now('Asia/Ho_Chi_Minh');
                ?>
                <tbody>
                    @foreach ($schedule as $key =>$value)
                        <tr>
                            <td>{{ ++$key }}</td>
                            <td>{{ $value->name_user }}</td>
                            <td>{{ $value->name }}</td>
                            <td>{{ date($value->onAll_day) }}</td>
                            @if ($value->session == 1)
                                <td>Chiều</td>
                            @else
                                <td>Sáng</td>
                            @endif
                            <td>{{ $value->name_room }}</td>
                            @if($now->toDateString() > $value->onAll_day)
                                <td>Quá lịch trực</td>
                            @elseif($now->toDateString() == $value->onAll_day)
                                <td>Đang Trực</td>
                            @elseif($now->toDateString() < $value->onAll_day)
                                <td>Chưa đến lịch trực</td>
                            @endif
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
      </div>
    </div>
  </section>
@endsection
