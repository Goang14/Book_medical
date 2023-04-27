@extends('layouts.app')

@section('content')
<section class="banner">
	<div class="container">
		<div class="row">
			<div class="col-lg-6 col-md-12 col-xl-7">
				<div class="block">
					<div class="divider mb-3"></div>
					<span class="text-uppercase text-sm letter-spacing ">GIẢI PHÁP CHĂM SÓC SỨC KHỎE TỔNG THỂ</span>
					<h1 class="mb-3 mt-3">Đối tác sức khỏe đáng tin cậy nhất của bạn</h1>

					{{-- <p class="mb-4 pr-5">A repudiandae ipsam labore ipsa voluptatum quidem quae laudantium quisquam aperiam maiores sunt fugit, deserunt rem suscipit placeat.</p> --}}
					<div class="btn-container ">
						<a href="{{ url('book_appoinment') }}" target="_blank" class="btn btn-main-2 btn-icon btn-round-full">Đặt lịch <i class="icofont-simple-right ml-2  "></i></a>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<section class="features">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="feature-block d-lg-flex">
					<div class="feature-item mb-5 mb-lg-0">
						<div class="feature-icon mb-4">
							<i class="icofont-surgeon-alt"></i>
						</div>
						<span>Dịch vụ 24 giờ</span>
						<h4 class="mb-3">Đặt hẹn trực tuyến</h4>
						<p class="mb-4">Nhận hỗ trợ kịp thời cho trường hợp khẩn cấp. Chúng tôi đã giới thiệu nguyên tắc y học gia đình</p>
						<a href="{{ url('book_appoinment') }}" class="btn btn-main btn-round-full">Đặt lịch hẹn</a>
					</div>

					<div class="feature-item mb-5 mb-lg-0">
						<div class="feature-icon mb-4">
							<i class="icofont-ui-clock"></i>
						</div>
						<span>Thời gian biểu</span>
						<h4 class="mb-3">Giờ làm việc</h4>
						<ul class="w-hours list-unstyled">
		                    <li class="d-flex justify-content-between">Sun - Wed : <span>8:00 - 17:00</span></li>
		                    <li class="d-flex justify-content-between">Thu - Fri : <span>9:00 - 17:00</span></li>
		                    <li class="d-flex justify-content-between">Sat - sun : <span>10:00 - 17:00</span></li>
		                </ul>
					</div>

					<div class="feature-item mb-5 mb-lg-0">
						<div class="feature-icon mb-4">
							<i class="icofont-support"></i>
						</div>
						<span>Trường hợp khẩn cấp</span>
						<h4 class="mb-3">+(84) 355679214</h4>
						<p>Nhận hỗ trợ mọi lúc cho trường hợp khẩn cấp. Chúng tôi đã giới thiệu nguyên tắc y học gia đình. Hãy kết nối với chúng tôi nếu có bất kỳ trường hợp khẩn cấp nào.</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
{{-- <section class="section about">
	<div class="container">
		<div class="row align-items-center">
			<div class="col-lg-4 col-sm-6">
				<div class="about-img">
					<img src="images/about/img-1.jpg" alt="" class="img-fluid">
					<img src="images/about/img-2.jpg" alt="" class="img-fluid mt-4">
				</div>
			</div>
			<div class="col-lg-4 col-sm-6">
				<div class="about-img mt-4 mt-lg-0">
					<img src="images/about/img-3.jpg" alt="" class="img-fluid">
				</div>
			</div>
			<div class="col-lg-4">
				<div class="about-content pl-4 mt-4 mt-lg-0">
					<h2 class="title-color">Chăm sóc cá nhân<br>& lối sống lành mạnh</h2>
					<p class="mt-4 mb-5">We provide best leading medicle service Nulla perferendis veniam deleniti ipsum officia dolores repellat laudantium obcaecati neque.</p>

					<a href="{{ url('services') }}" class="btn btn-main-2 btn-round-full btn-icon">Services<i class="icofont-simple-right ml-3"></i></a>
				</div>
			</div>
		</div>
	</div>
</section> --}}
{{-- <section class="cta-section ">
	<div class="container">
		<div class="cta position-relative">
			<div class="row">
				<div class="col-lg-3 col-md-6 col-sm-6">
					<div class="counter-stat">
						<i class="icofont-doctor"></i>
						<span class="h3">58</span>k
						<p>Happy People</p>
					</div>
				</div>
				<div class="col-lg-3 col-md-6 col-sm-6">
					<div class="counter-stat">
						<i class="icofont-flag"></i>
						<span class="h3">700</span>+
						<p>Surgery Comepleted</p>
					</div>
				</div>

				<div class="col-lg-3 col-md-6 col-sm-6">
					<div class="counter-stat">
						<i class="icofont-badge"></i>
						<span class="h3">40</span>+
						<p>Expert Doctors</p>
					</div>
				</div>
				<div class="col-lg-3 col-md-6 col-sm-6">
					<div class="counter-stat">
						<i class="icofont-globe"></i>
						<span class="h3">20</span>
						<p>Worldwide Branch</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</section> --}}
<section class="section service gray-bg">
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
			<div class="col-lg-4 col-md-6 col-sm-6">
				<div class="service-item mb-4">
					<div class="icon d-flex align-items-center">
						<i class="icofont-laboratory text-lg"></i>
						<h4 class="mt-3 mb-3">Dịch vụ xét nghiệm</h4>
					</div>

					<div class="content">
						<p class="mb-4"></p>
					</div>
				</div>
			</div>

			<div class="col-lg-4 col-md-6 col-sm-6">
				<div class="service-item mb-4">
					<div class="icon d-flex align-items-center">
						<i class="icofont-heart-beat-alt text-lg"></i>
						<h4 class="mt-3 mb-3">Bệnh tim</h4>
					</div>
					<div class="content">
						<p class="mb-4"></p>
					</div>
				</div>
			</div>

			<div class="col-lg-4 col-md-6 col-sm-6">
				<div class="service-item mb-4">
					<div class="icon d-flex align-items-center">
						<i class="icofont-tooth text-lg"></i>
						<h4 class="mt-3 mb-3">Chăm sóc nha khoa</h4>
					</div>
					<div class="content">
						<p class="mb-4"></p>
					</div>
				</div>
			</div>


			<div class="col-lg-4 col-md-6 col-sm-6">
				<div class="service-item mb-4">
					<div class="icon d-flex align-items-center">
						<i class="icofont-crutch text-lg"></i>
						<h4 class="mt-3 mb-3">Phẫu thuật cơ thể</h4>
					</div>

					<div class="content">
						<p class="mb-4"></p>
					</div>
				</div>
			</div>

			<div class="col-lg-4 col-md-6 col-sm-6">
				<div class="service-item mb-4">
					<div class="icon d-flex align-items-center">
						<i class="icofont-brain-alt text-lg"></i>
						<h4 class="mt-3 mb-3">Thần kinh Sargery</h4>
					</div>
					<div class="content">
						<p class="mb-4"></p>
					</div>
				</div>
			</div>

			<div class="col-lg-4 col-md-6 col-sm-6">
				<div class="service-item mb-4">
					<div class="icon d-flex align-items-center">
						<i class="icofont-dna-alt-1 text-lg"></i>
						<h4 class="mt-3 mb-3">Phụ khoa</h4>
					</div>
					<div class="content">
						<p class="mb-4"></p>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<section class="section appoinment">
	<div class="container">
		<div class="row align-items-center">
			<div class="col-lg-6 ">
				<div class="appoinment-content">
					<img src="images/tham-lang.jpg" alt="" class="img-fluid">
					<div class="emergency">
						<h2 class="text-lg"><i class="icofont-phone-circle text-lg"></i>+(84) 355679214</h2>
					</div>
				</div>
			</div>
            <div class="col-lg-6">
                <div class="appoinment-wrap mt-5 mt-lg-0 pl-lg-5 shadow-sm p-5 mb-5 bg-white rounded">
                    <h2 class="mb-2 title-color">Đặt lịch hẹn</h2>
                        <form id="#" class="appoinment-form" method="post" action="#">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <select class="form-control" id="exampleFormControlSelect1">
                                            <option>------Chọn Khoa------</option>
                                            @foreach ($dataDepartment as $key => $value )
                                                <option value="{{ $key }}">{{ $value->department_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <select class="form-control" id="exampleFormControlSelect2">
                                            <option>------Chọn bác sĩ------</option>
                                            <option>Software Design</option>
                                            <option>Development cycle</option>
                                            <option>Software Development</option>
                                            <option>Maintenance</option>
                                            <option>Process Query</option>
                                            <option>Cost and Duration</option>
                                            <option>Modal Delivery</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="name">Họ tên:</label>
                                    <input type="text" class="form-control" id="name" name="name" required>
                                </div>

                                <div class="form-group">
                                    <label for="email">Email:</label>
                                    <input type="email" class="form-control" id="email" name="email" required>
                                </div>

                                <div class="form-group">
                                    <label for="phone">Số điện thoại:</label>
                                    <input type="tel" class="form-control" id="phone" name="phone" required>
                                </div>

                                <label for="phone">Giới tính:</label>

                                <div class="row mt-3">
                                    <div class="form-check col-4 ps-5">
                                        <input class="form-check-input" type="radio" name="gender" id="male" value="male" checked>
                                        <label class="form-check-label" for="male">Male</label>
                                    </div>
                                    <div class="form-check col-4">
                                        <input class="form-check-input" type="radio" name="gender" id="female" value="female">
                                        <label class="form-check-label" for="female">Female</label>
                                    </div>
                                </div>

                                <div class="form-group mt-4">
                                    <label for="address">Địa chỉ</label>
                                    <input type="address" class="form-control" id="address" name="address" required>
                                </div>

                                <div class="form-group">
                                    <label for="date">Ngày hẹn:</label>
                                    <input type="date" class="form-control" id="date" name="date" required>
                                </div>

                                <div class="form-group">
                                    <label for="time">Thời gian hẹn:</label>
                                    <input type="time" class="form-control" id="time" name="time" required>
                                </div>

                                <div class="form-group">
                                    <label for="note">Ghi chú</label>
                                    <input type="text" class="form-control" id="note" name="note" required>
                                </div>
                                <button type="submit" class="btn btn-primary">Đặt lịch</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
		</div>
	</div>
</section>
<section class="section testimonial-2 gray-bg">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-lg-7">
				<div class="section-title text-center">
					<h2>Chúng tôi đã phục vụ hơn 5000+ Bệnh nhân</h2>
					<div class="divider mx-auto my-4"></div>
					<p>Hãy biết nhiều hơn về nhu cầu của nỗi đau mà chúng ta có thể khắc nghiệt hơn để những niềm vui rơi vào những rắc rối của những người khen ngợi chúng ta. Hãy để anh ta tìm kiếm những điều lớn lao hơn.</p>
				</div>
			</div>
		</div>
	</div>

	<div class="container">
		<div class="row align-items-center">
			<div class="col-lg-12 testimonial-wrap-2">
				<div class="testimonial-block style-2  gray-bg">
					<i class="icofont-quote-right"></i>

					<div class="testimonial-thumb">
						<img src="images/team/test-thumb1.jpg" alt="" class="img-fluid">
					</div>

					<div class="client-info ">
						<h4>Amazing service!</h4>
						<span>John Partho</span>
						<p>
							They provide great service facilty consectetur adipisicing elit. Itaque rem, praesentium, iure, ipsum magnam deleniti a vel eos adipisci suscipit fugit placeat.
						</p>
					</div>
				</div>

				<div class="testimonial-block style-2  gray-bg">
					<div class="testimonial-thumb">
						<img src="images/team/test-thumb2.jpg" alt="" class="img-fluid">
					</div>

					<div class="client-info">
						<h4>Expert doctors!</h4>
						<span>Mullar Sarth</span>
						<p>
							They provide great service facilty consectetur adipisicing elit. Itaque rem, praesentium, iure, ipsum magnam deleniti a vel eos adipisci suscipit fugit placeat.
						</p>
					</div>

					<i class="icofont-quote-right"></i>
				</div>

				<div class="testimonial-block style-2  gray-bg">
					<div class="testimonial-thumb">
						<img src="images/team/test-thumb3.jpg" alt="" class="img-fluid">
					</div>

					<div class="client-info">
						<h4>Good Support!</h4>
						<span>Kolis Mullar</span>
						<p>
							They provide great service facilty consectetur adipisicing elit. Itaque rem, praesentium, iure, ipsum magnam deleniti a vel eos adipisci suscipit fugit placeat.
						</p>
					</div>

					<i class="icofont-quote-right"></i>
				</div>

				<div class="testimonial-block style-2  gray-bg">
					<div class="testimonial-thumb">
						<img src="images/team/test-thumb4.jpg" alt="" class="img-fluid">
					</div>

					<div class="client-info">
						<h4>Nice Environment!</h4>
						<span>Partho Sarothi</span>
						<p class="mt-4">
							They provide great service facilty consectetur adipisicing elit. Itaque rem, praesentium, iure, ipsum magnam deleniti a vel eos adipisci suscipit fugit placeat.
						</p>
					</div>
					<i class="icofont-quote-right"></i>
				</div>

				<div class="testimonial-block style-2  gray-bg">
					<div class="testimonial-thumb">
						<img src="images/team/test-thumb1.jpg" alt="" class="img-fluid">
					</div>

					<div class="client-info">
						<h4>Modern Service!</h4>
						<span>Kolis Mullar</span>
						<p>
							They provide great service facilty consectetur adipisicing elit. Itaque rem, praesentium, iure, ipsum magnam deleniti a vel eos adipisci suscipit fugit placeat.
						</p>
					</div>
					<i class="icofont-quote-right"></i>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection
