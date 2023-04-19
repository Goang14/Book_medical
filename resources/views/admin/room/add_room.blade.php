@extends('admin.layouts.app')

@section('content-admin')
<section>
    <h2 class="text-center">Thêm thông tin Phòng </h2>
    <form class="container w-75 mt-4" method="POST" enctype="multipart/form-data">
        <input type="hidden" id="id_room" data-id = "{{ $dataRoom->id ?? '' }}">
        @csrf
         @if(isset($dataRoom) && !empty($dataRoom))
            <div class="col">
                <label for="formGroupExampleInput" class="form-label">Tên Phòng</label>
                <input type="text" id="room" value="{{ $dataRoom->name_room }}" class="form-control" placeholder="" aria-label="name">
            </div>
            <div class="col mt-3">
                <label for="formGroupExampleInput" class="form-label">Tên Khoa</label>
                <select class="form-select" name="" id="department">
                    <option value="0">-----Chọn tên khoa -----</option>
                    @foreach ($department as $value)
                        @if(isset($dataRoom) && !empty($dataRoom))
                            @if($value->id == $dataRoom->id )
                                <option value="{{ $value->id }}" selected>{{ $value->department_name }}</option>
                            @else
                                <option value="{{ $value->id }}">{{ $value->department_name }}</option>
                            @endif
                        @else
                            <option value="{{ $value->id }}">{{ $value->department_name }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
        @else
            <div class="col">
                <label for="formGroupExampleInput" class="form-label">Tên Phòng</label>
                <input type="text" id="room" value="" class="form-control" placeholder="" aria-label="name">
            </div>
            <div class="col mt-3">
                <label for="formGroupExampleInput" class="form-label">Tên Khoa</label>
                <select class="form-select" name="" id="department">
                    <option value="0">-----Chọn tên khoa -----</option>
                    @foreach ($department as $value)
                        <option value="{{ $value->id }}">{{ $value->department_name }}</option>
                    @endforeach
                </select>
            </div>
        @endif
        <div class="mt-5">
            <button type="button" class="btn btn-success d-flex" {{ (isset($dataRoom) && !empty($dataRoom)) ? 'onclick=updateRoom()' : 'onclick=addRoom()' }}>
                {{ (isset($dataRoom) && !empty($dataRoom)) ? 'Sửa' : 'Thêm' }}
            </button>
        </div>
    </form>
</section>
@endsection

<script>

    let config = {
            routes: {
                update: "{{ URL::route("admin.update_room")}}",
                home: "{{ asset("admin/room")}}",
                add: "{{ URL::route("admin.add_room") }}",
            }
    };
    function addRoom(){
        let room_name = $('#room').val();
        let department = $('#department').val();
        let formData = new FormData();
        formData.append('room_name', room_name);
        formData.append('department', department);

        $.ajax({
            type: 'post',
            url: config.routes.add,
            data: formData,
            processData: false,
            contentType: false,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(data) {
                if (data.status == 200) {
                    alert("success");
                    window.location.href  = config.routes.home;
                }
            },
            error: function(errors) {
                alert("Error")
            }
        })
    }

    function updateRoom(){
        let id_room = $('#id_room').data('id');
        let room_name = $('#room').val();
        let department = $('#department').val();
        let formData = new FormData();
        formData.append('room_name', room_name);
        formData.append('department', department);
        formData.append('id_room', id_room);

        $.ajax({
            type: 'post',
            url: config.routes.update,
            data: formData,
            processData: false,
            contentType: false,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(data) {
                if (data.status == 200) {
                    alert("success");
                    window.location.href  = config.routes.home;
                }
            },
            error: function(errors) {
                alert("Error")
            }
        })
    }
</script>
