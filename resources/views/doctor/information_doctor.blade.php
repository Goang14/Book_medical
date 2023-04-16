@extends('doctor.layouts.app')

@section('content-doctor')
<div class="row padding container">
    <div class="col-10">
        <div class="card">
            <form action="" method="POST" class="form-horizontal">
                @csrf
                <div class="card-body mx-auto">
                    <h4 class="card-title">Thông tin bác sĩ </h4>
                    <div class="bia">
                        <img height="200" width="200" src="{{ asset('storage/avatar/'. $dataDoctor->image) }}" alt="...">
                        <div class="form-group row">
                            <label class="col-sm-3 text-right control-label col-form-label">Họ và Tên :</label>
                            <div class="col-sm-9">
                                <input readonly value="{{ $dataDoctor->name_doctor }}" type="text" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 text-right control-label col-form-label">Giới tính :</label>
                            <div class="col-sm-9">
                                @if($dataDoctor->sex == 0)
                                    <input readonly value="Nữ" type="text" class="form-control">
                                @else
                                    <input readonly value="Nam" type="text" class="form-control">
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 text-right control-label col-form-label">Học vị :</label>
                            <div class="col-sm-9">
                                <input readonly value="{{ $dataDoctor->name_degree }}" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="cono1" class="col-sm-3 text-right control-label col-form-label">Chuyên khoa :</label>
                            <div class="col-sm-9">
                                <input type="text" readonly value="{{ $dataDoctor->department_name }}" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 text-right control-label col-form-label">Phòng :</label>
                            <div class="col-sm-9">
                                <input type="text" value="{{ $dataDoctor->name_room }}" class="form-control" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 text-right control-label col-form-label">Địa chỉ :</label>
                            <div class="col-sm-9">
                                <input type="text" name="diachi" id="diachi" value="{{ $dataDoctor->address }}" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 text-right control-label col-form-label">Điện thoại : </label>
                            <div class="col-sm-9">
                                <input type="text" name="dienthoai" id="dienthoai" value="{{ $dataDoctor->phone }}" class="form-control">
                            </div>
                        </div>
                </div>
                <div class="border-top">
                    <div class="card-body">

                        <input type="submit" id="btn1" value="Cập nhật" class="btn btn-success">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
