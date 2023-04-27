@extends('layouts.app')

@section('content')
<section class="page-title bg-1">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
        <div class="col-md-12">
            <div class="block text-center">
            <span class="text-white">Tất cả các bộ phận</span>
            <h1 class="text-capitalize mb-5 text-lg">Bộ phận chăm sóc</h1>
            </div>
        </div>
        </div>
    </div>
</section>

<section class="section service-2">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-7 text-center">
                <div class="section-title">
                    <h2>Giải thưởng chăm sóc bệnh nhân</h2>
                    <div class="divider mx-auto my-4"></div>
                    <p>Hãy biết nhiều hơn về nhu cầu của nỗi đau mà chúng ta có thể khắc nghiệt hơn để những niềm vui rơi vào những rắc rối của những người khen ngợi chúng ta. Hãy để anh ta tìm kiếm những điều lớn lao hơn.</p>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach ($dataDepartment as $value)
                <div class="col-lg-4 col-md-6">
                    <div class="department-block mb-5">
                        <img  src="{{ asset('storage/department/' . $value->image) }}" alt="" style="height:285px" class="w-100">
                        <div class="content">
                            <h4 class="mt-4 mb-2 title-color">{{ $value->department_name }}</h4>
                            <p class="mb-4">{{ $value->description }}</p>
                            <button class="btn btn-danger"><a class="text-decoration-none text-white" href="{{ url('detai_department/' .$value->id) }}">Đặt lịch</a></button>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endsection
