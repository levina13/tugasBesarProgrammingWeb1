@extends('layouts.main')
@section('layout_title', 'Home')
@section('layout_content')
<section class="section-popular" id="popular">
			<div class="container">
				<div class="row">
					<div class="col text-center section-popular-heading">
					<h2>Wisata Terpopuler</h2>
					<p>Sesuatu yang belum Anda lihat sebelumnya di dunia</p>
					</div>
				</div>
			</div>
		</section>

		<section class="section-popular-content" id="popularContent">
			<div class="container">
				<div class="section-popular-travel row justify-content-center">
					<div class="col-sm-6 col-md-4 col-lg-3">
						<div class="card-travel text-center d-flex flex-column" style="background-image: url('{{'/assets/img/objek/bns.jpg'}}')">
							<div class="travel-country">Batu</div>
							<div class="travel-location">BNS</div>
							<div class="travel-button mt-auto">
								<a href="#" class="btn btn-travel-details px-4">
									Detail Wisata
								</a>
							</div>
						</div>
					</div>
					<div class="col-sm-6 col-md-4 col-lg-3">
						<div class="card-travel text-center d-flex flex-column" style="background-image: url('{{'/assets/img/objek/museumAngkut.jpg'}}')">
							<div class="travel-country">Batu</div>
							<div class="travel-location">Museum Angkut</div>
							<div class="travel-button mt-auto">
								<a href="#" class="btn btn-travel-details px-4">
									Detail Wisata
								</a>
							</div>
						</div>
					</div>
					<div class="col-sm-6 col-md-4 col-lg-3">
						<div class="card-travel text-center d-flex flex-column" style="background-image: url('{{'/assets/img/objek/gunungbanyak.jpg'}}')">
							<div class="travel-country">Batu</div>
							<div class="travel-location">Gunung Banyak</div>
							<div class="travel-button mt-auto">
								<a href="#" class="btn btn-travel-details px-4">
									Detail Wisata
								</a>
							</div>
						</div>
					</div>
				</div>

			</div>
		</section>

		<section class="section-testimonial-heading" id="testimonialHeading">
			<div class="container">
				<div class="row">
					<div class="col text-center">
					<h2>Ulasan</h2>
					<p>Saat-saat memberi mereka pengalaman terbaik</p>
					</div>
				</div>
			</div>
		</section>

		<section class="section section-testimonial-content" id="testimonialContent">
			<div class="container">
				<div class="section-popular-travel row justify-content-center">
					<div class="col-sm-6 col-md-6 col-lg-4">
						<div class="card card-testimonial text-center">
							<div class="testiominal-content">
								<img src="https://i.pravatar.cc/300" alt="User" class="mb-4 rounded-circle" />
								<h3 class="mb-4">Angga Risky</h3>
								<p class="testimonial">
									“ It was glorious and I could not stop to say wohooo for
									every single moment Dankeeeeee “
								</p>
							</div>
							<hr />
							<p class="trip-to mt-2">Ubud</p>
						</div>
					</div>
					<div class="col-sm-6 col-md-6 col-lg-4">
						<div class="card card-testimonial text-center">
							<div class="testiominal-content">
								<img src="https://i.pravatar.cc/300" alt="User" class="mb-4 rounded-circle" />
								<h3 class="mb-4">Shayna</h3>
								<p class="testimonial">
									“ The trip was amazing and I saw something beautiful in that
									Island that makes me want to learn more “
								</p>
							</div>
							<hr />
							<p class="trip-to mt-2">Nusa Penida</p>
						</div>
					</div>
					<div class="col-sm-6 col-md-6 col-lg-4">
						<div class="card card-testimonial text-center">
							<div class="testiominal-content">
								<img src="https://i.pravatar.cc/300" alt="User" class="mb-4 rounded-circle" />
								<h3 class="mb-4">Shabrina</h3>
								<p class="testimonial">
									“ I loved it when the waves was shaking harder — I was
									scared too, but it's very beautifull“
								</p>
							</div>
							<hr />
							<p class="trip-to mt-2">Karimun Jawa</p>
						</div>
					</div>
				</div>
			</div>
		</section>
@endsection