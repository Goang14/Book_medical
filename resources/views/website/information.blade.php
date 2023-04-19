@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="text-center mb-5">Thông tin cá nhân</h1>
        <div class="row justify-content-end">
            <div class="col-md-10">
                <div class="form-group">
                    <label for="name">Họ tên:</label>
                    <input type="name" value="{{ $dataUser->name }}" class="form-control col-10" id="name" name="name" required>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" value="{{ $dataUser->email }}"  class="form-control col-10" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="phone">Số điện thoại</label>
                    <input type="phone" value="{{ $dataUser->phone }}"  class="form-control col-10" id="phone" name="phone" required>
                </div>
                <div class="form-group">
                    <label for="address">Địa chỉ</label>
                    <input type="address" value="{{ $dataUser->address }}"  class="form-control col-10" id="address" name="address" required>
                </div>
                <div class="form-group">
                    <label for="name">Ngày sinh</label>
                    <input type="date" value="{{ $dataUser->birth_day }}"  class="form-control col-10" id="birth_day" name="name" required>
                </div>
            </div>
            <button class="btn btn-success w-25 mt-5 mx-auto" onclick="updateInformation()">Cập nhật thông tin</button>
        </div>
    </div>
@endsection

<script>
    function updateInformation(){
        loadPage(true);
        let name = $('#name').val();
        let phone = $('#phone').val();
        let email = $('#email').val();
        let address = $('#address').val();
        let birth_day = $("#birth_day").val();
        $.ajax({
            type: 'POST',
            url: 'update_information',
            data: {
                name: name,
                phone: phone,
                email: email,
                address: address,
                birth_day: birth_day,
            },
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
        }).done(function(){
        }).always(function() {
            loadPage(false);
            setTimeout(() => {
                loader.classList.add("loader--hidden");
            }, 1000);
        });
    }
</script>
