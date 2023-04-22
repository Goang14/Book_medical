@extends('admin.layouts.app')

@section('content-admin')
<section>

    <h2 class="text-center">Thêm thông tin Bác sĩ</h2>
    <form class="container w-50 mt-4" method="POST" enctype="multipart/form-data">
        @if(isset($dataDoctor) && !empty($dataDoctor))
            <div class="wrap-input100 validate-input">
                <label for="formGroupExampleInput" class="form-label">Họ và tên</label>
                <input id="name" type="text" value="{{ $dataDoctor->name_doctor }}" class="form-control input100 @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="wrap-input100 validate-input mt-3">
                <label for="formGroupExampleInput" class="form-label">Email</label>
                <input id="email" type="email" value="{{ $dataDoctor->email }}" class="form-control input100 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="wrap-input100 validate-input mt-3" data-validate="Enter password">
                <label for="formGroupExampleInput" class="form-label">Mật khẩu</label>
                <input id="password" type="password" class="form-control input100 @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="wrap-input100 validate-input mt-3" data-validate="Enter password">
                <label for="formGroupExampleInput" class="form-label">Nhập lại mật khẩu</label>
                <input id="password-confirm" type="password" class="form-control input100" name="password_confirmation" required autocomplete="new-password">
            </div>

            <div class="col mt-3">
                <label for="formGroupExampleInput" class="form-label">Ngày sinh</label>
                <input type="date" id="birthday" value="{{ $dataDoctor->birth_day }}" class="form-control" placeholder="" aria-label="Department name">
            </div>
            <div class="col mt-3">
                <label for="formGroupExampleInput" class="form-label">Địa chỉ</label>
                <input type="address" id="address" value="{{ $dataDoctor->address }}" class="form-control" placeholder="" aria-label="description" maxlength="255">
            </div>
            <div class="col mt-3">
                <label for="formGroupExampleInput" class="form-label">Số điện thoại</label>
                <input type="phone" id="phone" value="{{ $dataDoctor->phone }}" class="form-control" name="phone">
            </div>
            <div class="col mt-3">
                <label for="formGroupExampleInput" class="form-label">Tên Khoa</label>
                <select class="form-select" name="" id="department" onchange="test()">
                    <option value="0">-----Chọn tên khoa -----</option>
                    @foreach ($dataDepartment as $value)
                        @if($value->id == $dataDoctor->id_department)
                            <option value="{{ $value->id }}" selected>{{ $value->department_name }}</option>
                        @else
                            <option value="{{ $value->id }}">{{ $value->department_name }}</option>
                        @endif
                    @endforeach
                </select>
            </div>

            <div class="col mt-3">
                <label for="formGroupExampleInput" class="form-label">Phòng Khám</label>
                <select class="form-select" name="" id="room" >
                    <option value="0">-----Chọn phòng-----</option>
                </select>
            </div>

            <div class="col mt-3">
                <label for="formGroupExampleInput" class="form-label">Học vị</label>
                <select class="form-select" name="" id="degree">
                    <option value="0">-----Chọn-----</option>
                    @foreach ($dataDegree as $value)
                        @if($value->id == $dataDoctor->id_degree)
                            <option value="{{ $value->id }}" selected>{{ $value->name }}</option>
                        @else
                            <option value="{{ $value->id }}">{{ $value->name }}</option>
                        @endif
                    @endforeach
                </select>
            </div>

            <div class="col mt-3">
                <label for="formGroupExampleInput" class="form-label">Avatar</label>
                <input type="file" id="imgUpload" class="form-control" name="image" accept="image/*" multiple />
            </div>
        @else
            <div class="wrap-input100 validate-input">
                <label for="formGroupExampleInput" class="form-label">Họ và tên</label>
                <input id="name" type="text" class="form-control input100 @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="wrap-input100 validate-input mt-3">
                <label for="formGroupExampleInput" class="form-label">Email</label>
                <input id="email" type="email" class="form-control input100 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="wrap-input100 validate-input mt-3" data-validate="Enter password">
                <label for="formGroupExampleInput" class="form-label">Mật khẩu</label>
                <input id="password" type="password" class="form-control input100 @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="wrap-input100 validate-input mt-3" data-validate="Enter password">
                <label for="formGroupExampleInput" class="form-label">Nhập lại mật khẩu</label>
                <input id="password-confirm" type="password" class="form-control input100" name="password_confirmation" required autocomplete="new-password">
            </div>

            <div class="col mt-3">
                <label for="formGroupExampleInput" class="form-label">Ngày sinh</label>
                <input type="date" id="birthday" value="" class="form-control" placeholder="" aria-label="Department name">
            </div>
            <div class="col mt-3">
                <label for="formGroupExampleInput" class="form-label">Địa chỉ</label>
                <input type="address" id="address" value="" class="form-control" placeholder="" aria-label="description" maxlength="255">
            </div>
            <div class="col mt-3">
                <label for="formGroupExampleInput" class="form-label">Số điện thoại</label>
                <input type="phone" id="phone" class="form-control" name="phone">
            </div>
            <div class="col mt-3">
                <label for="formGroupExampleInput" class="form-label">Tên Khoa</label>
                <select class="form-select" name="" id="department" onchange="test()">
                    <option value="0">-----Chọn tên khoa -----</option>
                    @foreach ($dataDepartment as $value)
                        <option value="{{ $value->id }}">{{ $value->department_name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="col mt-3">
                <label for="formGroupExampleInput" class="form-label">Phòng Khám</label>
                <select class="form-select" name="" id="room">
                    <option value="0">-----Chọn phòng-----</option>
                </select>
            </div>

            <div class="col mt-3">
                <label for="formGroupExampleInput" class="form-label">Học vị</label>
                <select class="form-select" name="" id="degree">
                    <option value="0">-----Chọn-----</option>
                    @foreach ($dataDegree as $value)
                        <option value="{{ $value->id }}">{{ $value->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="col mt-3">
                <label for="formGroupExampleInput" class="form-label">Avatar</label>
                <input type="file" id="imgUpload" class="form-control" name="image" accept="image/*" multiple />
            </div>
        @endif
            <div class="mt-5">
                <button type="button" class="btn btn-success d-flex" {{ (isset($dataDoctor) && !empty($dataDoctor)) ? 'onclick=editDoctor()' : 'onclick=addDoctor()'}} >
                    {{ (isset($dataDoctor) && !empty($dataDoctor)) ? 'Edit' : 'Thêm'}}
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
        let id = $('#department').val();
        $.ajax({
            url: `getDepartment/${id}`,
            method: "GET",
            dataType: 'json',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(getListDataRoom) {
                let html = '';
                console.log(getListDataRoom);
                getListDataRoom.forEach(function(value,index){
                    html = `${html}<option value="${value.id}"  >${value.name_room}</option>`
                })
                $('#room').html(html);
            }
        })
    }

    function addDoctor(){
        let name = $('#name').val();
        let email = $('#email').val();
        let password = $('#password').val();
        let birthDay = $('#birthday').val();
        let address = $('#address').val();
        let phone = $('#phone').val();
        let department = $('#department').val();
        let room = $('#room').val();
        let degree = $('#degree').val();
        let images = $('#imgUpload')[0].files[0];
        let formData = new FormData();
        formData.append('name', name);
        formData.append('email', email);
        formData.append('password', password);
        formData.append('birthDay', birthDay);
        formData.append('address', address);
        formData.append('phone', phone);
        formData.append('department', department);
        formData.append('room', room);
        formData.append('degree', degree);
        formData.append('role', 2);
        formData.append('avatar', images);
        $.ajax({
            type: 'POST',
            url: 'create-doctor',
            data:formData,
            processData: false,
            contentType: false,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(data) {
                if (data.status == 200) {
                    alert("Bạn đã thêm thành công");
                    window.location.href  = "doctor";
                }
            },
        })
    }

    function updateDoctor(){
        let name = $('#name').val();
        let email = $('#email').val();
        let password = $('#password').val();
        let birthDay = $('#birthday').val();
        let address = $('#address').val();
        let phone = $('#phone').val();
        let department = $('#department').val();
        let room = $('#room').val();
        let degree = $('#degree').val();
        let formData = new FormData();
        formData.append('name', name);
        formData.append('email', email);
        formData.append('password', password);
        formData.append('birthDay', birthDay);
        formData.append('address', address);
        formData.append('phone', phone);
        formData.append('department', department);
        formData.append('room', room);
        formData.append('degree', degree);
        formData.append('role', 2);

        $.ajax({
            type: 'POST',
            url: 'create-doctor',
            data:formData,
            processData: false,
            contentType: false,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
        }).done(function(){

        })
    }
</script>
