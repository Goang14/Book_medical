@extends('layouts.app')

@section('content')
<section class="service-2">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-7 text-center">
                <div class="section-title">
                    <h1>Khoa</h1>
                    <div class="divider mx-auto mt-2 mb-4"></div>
                    <h3>{{ $listData->first()->department_name }}</h3>
                </div>
            </div>
        </div>
        <h1>Tìm kiếm thông tin bác sĩ</h1>
        <form action="{{ route('searchDoctor') }}" method="GET">
            <div class="d-flex">
                <input type="hidden" name="value" value="{{ $listData->first()->department_id }}">
                <input class="col-4 form-control border-1" type="text" name="query" placeholder="Search...">
                <button class="btn btn-dark ms-3" type="submit">Tìm kiếm</button>
            </div>
        </form>
        @if(isset($searchResults) && !empty($searchResults))
            <div class="row mt-5">
                <div class="col-lg-4">
                    <div class="section-title">
                        <h2>Thông tin bác sĩ</h2>
                        <div class="divider mt-2 mb-0"></div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="card-body">
                    <div class="table-responsive">
                    <table class="table border">
                        <thead>
                        <tr>
                            <th scope="col"></th>
                            <th scope="col">Tên Bác Sĩ</th>
                            <th scope="col">Học vị</th>
                            <th scope="col">Khoa</th>
                            <th scope="col">Giới tính</th>
                            <th></th>
                        </tr>
                        </thead>
                            <tbody>
                                @foreach ($searchResults as $value)
                                <tr>
                                    <td class="w-25 text-center">
                                        <img height="100" width="100" src="{{ asset('storage/avatar/'. $value->image) }}" alt="...">
                                    </td>
                                    <td>{{ $value->name }}</td>
                                    <td>{{ $value->name_degree }}</td>
                                    <td>{{ $value->department_name }}</td>
                                    @if($value->sex == 1)
                                        <td>Nam</td>
                                    @elseif($value->sex == 0 )
                                        <td>Nữ</td>
                                    @endif
                                    <td>
                                        <button class="btn btn-dark">
                                            <a class="text-decoration-none text-white" href="{{ url('onCall_Schedule/' .$value->id) }}">
                                                Chọn lịch
                                        </a>
                                        </button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                    </table>
                    </div>
                </div>
            </div>
        @else
            <div class="row mt-5">
                <div class="col-lg-4">
                    <div class="section-title">
                        <h2>Thông tin bác sĩ</h2>
                        <div class="divider my-2"></div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="card-body">
                    <div class="table-responsive">
                    <table class="table border">
                        <thead>
                        <tr>
                            <th scope="col"></th>
                            <th scope="col">Tên Bác Sĩ</th>
                            <th scope="col">Học vị</th>
                            <th scope="col">Khoa</th>
                            <th scope="col">Giới tính</th>
                            <th></th>
                        </tr>
                        </thead>
                            <tbody>
                                @foreach ($listData as $value)
                                <tr>
                                    <td class="w-25 text-center">
                                        <img height="100" width="100" src="{{ asset('storage/avatar/'. $value->image) }}" alt="...">
                                    </td>
                                    <td>{{ $value->name }}</td>
                                    <td>{{ $value->name_degree }}</td>
                                    <td>{{ $value->department_name }}</td>
                                    @if($value->sex == 1)
                                        <td>Nam</td>
                                    @elseif($value->sex == 0 )
                                        <td>Nữ</td>
                                    @endif
                                    <td>
                                        <button class="btn btn-dark">
                                            <a class="text-decoration-none text-white" href="{{ url('onCall_Schedule/' .$value->id) }}">
                                                Chọn lịch
                                        </a>
                                        </button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                    </table>
                    </div>
                </div>
            </div>
        @endif
    </div>
@endsection

<script>
    function searchDoctor(){
        var name = $('#search_doctor').val();
        $.ajax({
            url: `searchDoctor`,
            type: 'Get',
            data:{
                name:name
            },
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(data) {

            },
        })
    }
</script>
