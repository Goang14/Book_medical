@extends('admin.layouts.app')

@section('content-admin')
    <section>
        <h2 class="text-center">Thêm thông tin khoa</h2>
        <form class="container w-75 mt-4" method="POST" enctype="multipart/form-data">
            <input type="hidden" id="id_department" data-id="{{ $department->id ?? '' }}">
            @csrf
            @if(isset($department) && !empty($department))
                <div class="col">
                    <label for="formGroupExampleInput" class="form-label">Tên Khoa</label>
                    <input type="text" id="department" value="{{ $department->department_name }}" class="form-control" placeholder="Tên Khoa" aria-label="Department name">
                </div>
                <div class="col">
                    <label for="formGroupExampleInput" class="form-label">Mô tả</label>
                    <input type="text" id="description" value="{{ $department->description }}" class="form-control" placeholder="Mô tả" aria-label="description" maxlength="255"></input>
                </div>
                <div class="col">
                    <label for="formGroupExampleInput" class="form-label">Hình ảnh</label>
                    <input type="file" id="imgUpload" class="form-control" name="image" accept="image/*" multiple />
                </div>
            @else
                <div class="col">
                    <label for="formGroupExampleInput" class="form-label">Tên Khoa</label>
                    <input type="text" id="department" class="form-control" placeholder="Tên Khoa" aria-label="Department name">
                </div>
                <div class="col">
                    <label for="formGroupExampleInput" class="form-label">Mô tả</label>
                    <textarea type="text" id="description" class="form-control" placeholder="Mô tả" aria-label="description"></textarea>
                </div>
                <div class="col">
                    <label for="formGroupExampleInput" class="form-label">Hình ảnh</label>
                    <input type="file" id="imgUpload" class="form-control" name="image" accept="image/*" multiple />
                </div>
            @endif
            <div class="mt-5">
                <button type="button" class="btn btn-primary d-flex" {{ (isset($department) && !empty($department)) ? 'onclick=updateDepartment()' : 'onclick=addDepartment()'}} >
                    {{ (isset($department) && !empty($department)) ? 'EditDepartment' : 'Thêm'}}
                </button>
            </div>
        </form>
    </section>
@endsection
<script>
    function addDepartment(){
        let images = $('#imgUpload')[0].files[0];
        let department = $('#department').val();
        let description = $('#description').val();
        let formData = new FormData();
        formData.append('_token', '{{ csrf_token() }}');
        formData.append('file', images);
        formData.append('department', department);
        formData.append('description', description);
        $.ajax({
            type: 'POST',
            url: 'add',
            data: formData,
            processData: false,
            contentType: false,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(data) {
                if (data.status == 200) {
                    alert("success");
                    window.location.href  = "admin/department";
                }
            },
            error: function(errors) {
                alert("Error")
            }
        })
    }

    function updateDepartment(){
        let images = $('#imgUpload')[0].files[0];
        let department = $('#department').val();
        let description = $('#description').val();
        let id_department = $('#id_department').data('id');
        let formData = new FormData();
        formData.append('_token', '{{ csrf_token() }}');
        formData.append('file', images);
        formData.append('department', department);
        formData.append('description', description);
        formData.append('id_department', id_department);

        $.ajax({
            type: 'POST',
            url: 'http://127.0.0.1:8000/admin/update_department',
            data: formData,
            processData: false,
            contentType: false,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(data) {
                console.log(data.status);
                if (data.status == 200) {
                    alert("success");
                    window.location.href  = "admin/department";
                }
            },
            error: function(errors) {
                alert("Error")
            }
        })
    }
</script>
