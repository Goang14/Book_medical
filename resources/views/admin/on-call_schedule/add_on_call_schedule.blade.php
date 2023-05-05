@extends('admin.layouts.app')

@section('content-admin')
<section>
    <h2 class="text-center"> {{ isset($dataOncall) && !empty($dataOncall) ? 'Sửa lịch trực' : 'Thêm lịch trực' }}</h2>
    <form class="container w-50 mt-4" method="POST" enctype="multipart/form-data">
        @csrf
            <input type="hidden" id="idOncall" data-id="{{ isset($dataOncall) && !empty($dataOncall) ? $dataOncall->id_call_Schedule : ''}}">
            <div class="col">
                <label for="formGroupExampleInput" class="form-label">Tên bác sĩ</label>
                <select class="form-control" id="doctor" onchange="test()">
                    @if(isset($dataOncall) && !empty($dataOncall))
                        @foreach ($data as $key => $value )
                            @if($dataOncall->user_id == $value->user_id )
                                <option value="{{ $value->user_id }}" selected>{{ $value->name }}</option>
                            @else
                                <option value="{{ $value->user_id }}">{{ $value->name }}</option>
                            @endif
                        @endforeach
                    @else
                        <option>------Chọn bác sĩ------</option>
                        @foreach ($data as $key => $value )
                            <option value="{{ $value->user_id }}">{{ $value->name }}</option>
                        @endforeach
                    @endif
                </select>
            </div>
            <div class="col">
                <label for="formGroupExampleInput" class="form-label">Tên Khoa</label>
                <select class="form-control" id="department">
                    <option>------Chọn khoa------</option>
                    {{-- @foreach ($dataDepartment as $key => $value )
                        <option value="{{ $value->id }}">{{ $value->department_name }}</option>
                    @endforeach --}}
                </select>
            </div>
            <div class="col">
                <label for="formGroupExampleInput" class="form-label">Ngày trực</label>
                <input type="date" id="on_call_day" value="{{ isset($dataOncall) && !empty($dataOncall) ? $dataOncall->onAll_day : '' }}" class="form-control" aria-label="" min="<?php $day = date('Y-m-d', strtotime(' + 1 days'));echo $day; ?>"/>
            </div>
            <div class="col-12">
                <label for="formGroupExampleInput" class="form-label">Buổi trực</label>
                <select class="form-control col-4" id="session">
                    @if(isset($dataOncall) && !empty($dataOncall))
                        <option value="{{ $dataOncall->session }}" selected>
                            @if($dataOncall->session == 0)
                                Buổi Sáng
                            @elseif($dataOncall->session == 1)
                                Buổi Chiều
                            @endif
                        </option>
                    @else
                        <option value="">-----Chọn buổi trực-----</option>
                        <option value="1">Sáng</option>
                        <option value="0">Chiểu</option>
                    @endif

                </select>
            </div>
        <div class="mt-5">
            <button type="button" class="btn btn-success d-flex" {{ isset($dataOncall) && !empty($dataOncall) ? "onclick=updateOncallSchedule()" : "onclick=addOncallSchedule()" }} >
                {{ isset($dataOncall) && !empty($dataOncall) ? 'Cập nhật' : 'Thêm' }}
            </button>
        </div>
    </form>
</section>
@endsection
<script src="{{ asset('js/jquery-3.6.1.min.js') }}"></script>

<script>

    $( document ).ready(function() {
        test();
    });

    function test() {
        let id = $('#doctor').val();
        $.ajax({
            url: `http://127.0.0.1:8000/admin/getDataDepartmentDoctor/${id}`,
            method: "GET",
            dataType: 'json',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(getListDepartmentDoctor) {
                let html = '';
                console.log(getListDepartmentDoctor);
                getListDepartmentDoctor.forEach(function(value,index){
                    html = `${html}<option value="${value.department_id}">${value.department_name}</option>`
                })
                $('#department').html(html);
            }
        })
    }

    function addOncallSchedule(){
        let id = $('#idOncall').data('id');
        let doctor = $('#doctor').val();
        let department = $('#department').val();
        let on_call_day = $('#on_call_day').val();
        let session = $('#session').val();
        let formData = new FormData();
        formData.append('id', id);
        formData.append('doctor', doctor);
        formData.append('department', department);
        formData.append('on_call_day', on_call_day);
        formData.append('session', session);

        $.ajax({
            type: 'POST',
            url: `../add_on_call_schedule`,
            data:formData,
            processData: false,
            contentType: false,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(data) {
                if (data.status == 200) {
                    alert("Bạn đã update thành công");
                    window.location.href  = "admin/on_call_schedule";
                }
            },
        })
    }

    function updateOncallSchedule(){
        let id = $('#idOncall').data('id');
        let doctor = $('#doctor').val();
        let department = $('#department').val();
        let on_call_day = $('#on_call_day').val();
        let session = $('#session').val();
        let formData = new FormData();
        formData.append('id', id);
        formData.append('doctor', doctor);
        formData.append('department', department);
        formData.append('on_call_day', on_call_day);
        formData.append('session', session);

        $.ajax({
            type: 'POST',
            url: `../update-oncall-schedule/${id}`,
            data:formData,
            processData: false,
            contentType: false,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(data) {
                if (data.status == 200) {
                    alert("Bạn đã update thành công");
                    window.location.href  = "admin/on_call_schedule";
                }
            },
        })
    }
</script>
