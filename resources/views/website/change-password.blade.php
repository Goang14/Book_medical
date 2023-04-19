@extends('layouts.app')

@section('content')
<section >
    <div class="container col-3">
        <form method="POST" action="{{ route('user.change-password') }}">
            @csrf
            <div class="form-group">
                <label for="current_password">Mật khẩu cũ</label>
                <input type="password" class="form-control" id="current_password" name="current_password" required>
                @error('current_password')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="new_password">Mật khẩu mới</label>
                <input type="password" class="form-control" id="new_password" name="new_password" required>
                @error('new_password')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="new_password_confirmation">Nhập lại mật khẩu</label>
                <input type="password" class="form-control" id="new_password_confirmation" name="new_password_confirmation" required>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</section>

@endsection
