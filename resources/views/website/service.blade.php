@extends('layouts.app')

@section('content')

<section class="page-title bg-1">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="block text-center">
            <span class="text-white">Dịch vụ của chúng tôi</span>
            <h1 class="text-capitalize mb-5 text-lg">Chúng ta làm gì</h1>
          </div>
        </div>
      </div>
    </div>
  </section>
<section class="section service-2">
	<div class="container">
		<div class="row">
            @foreach ($dataService as $value)
			<div class="col-lg-4 col-md-6 col-sm-6">
				<div class="service-block mb-5">
                    <img src="images/service/service-1.jpg" alt="" class="img-fluid">
                    <div class="content">
                        <h4 class="mt-4 mb-2 title-color">{{ $value->name }}</h4>
                        <p class="mb-4">{{ $value->description }}</p>
                    </div>
                    <button class="btn btn-dark">Đặt lịch</button>
				</div>
			</div>
            @endforeach
		</div>
	</div>
</section>
<section class="section cta-page">
	<div class="container">
		<div class="row">
			<div class="col-lg-7">
				<div class="cta-content">
					<div class="divider mb-4"></div>
					<h2 class="mb-5 text-lg">Chúng tôi hân hạnh mang đến cho bạn cơ hội để có được sức khỏe</span></h2>
					<a href="{{ url('book_appoinment') }}" class="btn btn-main-2 btn-round-full">Nhận cuộc hẹn<i class="icofont-simple-right  ml-2"></i></a>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection
