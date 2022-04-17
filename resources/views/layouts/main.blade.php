<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta http-equiv="X-UA-Compatible" content="ie=edge" />
	<title>@yield('layout_title') | HOLIYOU</title>

	<link rel="stylesheet" href="/assets/libraries/bootstrap/css/bootstrap.css" />
	<link href="https://fonts.googleapis.com/css?family=Assistant:200,300,400,600,700,800|Playfair+Display:400,400i,700,700i,900,900i&display=swap" rel="stylesheet" />
	<link rel="stylesheet" href="/assets/css/main.css" />
	<link rel="stylesheet" href="/assets/libraries/fontawesome/css/all.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.7.1/leaflet.css" integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body class="d-flex flex-column min-vh-100">
    <!-- Navbar -->
	<div class="container sticky-top">
		<nav class="row navbar navbar-expand-lg navbar-light bg-white">
			<a href="{{ route('index') }}" class="navbar-brand">
				<img src="{{ asset('assets/img/logo.png') }}" alt="Logo" />
			</a>
			<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navb">
				<span class="navbar-toggler-icon"></span>
			</button>

			<div class="collapse navbar-collapse" id="navb">
				<ul class="navbar-nav mr-auto">
					<li class="nav-item mx-md-2">
						<a class="nav-link active">Destinasi Wisata</a>
					</li>
				</ul>

				<!-- Mobile Button -->
				<form class="form-inline d-block d-md-none">
                    @if (Auth::check())
					<li class="nav-item dropdown btn btn-login w-100 my-2 my-sm-0 d-flex">
						<button href="#" class="nav-link dropdown-toggle btn btn-login" id="navbardrop" data-toggle="dropdown">
							Hi, {{ Auth::user()->name }}!
						</button>
						<div class="dropdown-menu">
							@if (Auth::user()->is_admin)
							<a href="{{ route('halaman-admin') }}" class="dropdown-item"><i class="fas fa-user-cog mr-2"></i> Dashboard</a>
							@endif	
							<a href="{{ route('logout') }}" role="button" type="submit" class="dropdown-item"><i class="fas fa-sign-out-alt mr-2"></i> Logout</a>
						</div>
					</li>
					@else
						
					<li class="nav-item dropdown btn btn-login w-100 my-2 my-sm-0 d-flex">
						<a href="{{ route('login') }}" class="nav-link btn btn-login" id="navbardrop">
							Login/Register
						</a>
					</li>
					@endif
					{{-- <li class="nav-item dropdown btn btn-login w-100 my-2 my-sm-0 d-flex">
						<button href="#" class="nav-link dropdown-toggle btn btn-login btn-block text-center align-content-center justify-content-center" id="navbardrop" data-toggle="dropdown">
							Hi, User!
						</button>
						<div class="dropdown-menu w-100">
							<a href="#" class="dropdown-item"><i class="fas fa-user-circle mr-2"></i> Profil Saya</a>
							<a href="#" class="dropdown-item"><i class="fas fa-book mr-2"></i> Agenda Wisata</a>
							<a href="#" class="dropdown-item"><i class="fas fa-bookmark mr-2"></i> Keep</a>
						</div>
					</li> --}}
				</form>

				<!-- Desktop Button -->
				<form class="form-inline my-2 my-lg-0 d-none d-md-block float-right">
					@if (Auth::check())
					<li class="nav-item dropdown btn btn-login btn-navbar-right d-flex">
						<button href="#" class="nav-link dropdown-toggle btn btn-login" id="navbardrop" data-toggle="dropdown">
							Hi, {{ Auth::user()->name }}!
						</button>
						<div class="dropdown-menu">
							@if (Auth::user()->is_admin)
							<a href="{{ route('halaman-admin') }}" class="dropdown-item"><i class="fas fa-user-cog mr-2"></i> Dashboard</a>
							@endif	
							<a href="{{ route('logout') }}" role="button" type="submit" class="dropdown-item"><i class="fas fa-sign-out-alt mr-2"></i> Logout</a>
						</div>
					</li>
					@else
						
					<li class="nav-item btn btn-login btn-navbar-right d-flex align-content-center">
						<a href="{{ route('login') }}" class="nav-link btn btn-login" id="navbardrop">
							Login
						</a>
					</li>
					@endif
				</form>
			</div>
		</nav>
	</div>
    
    <!-- Header -->
	<header class="text-center">
		<h1>
			Cari Tujuan Wisata Terbaik
			<br />
			Hanya Beberapa Klik
		</h1>
		<p class="mt-3">
			Lihatlah pemandangan indah
			<br />
			yang belum Anda lihat sebelumnya
		</p>
		{{-- <a href="{{ route('public.list_wisata') }}" class="btn btn-get-started px-4 mt-4"> --}}
			{{-- Destinasi Wisata --}}
		{{-- </a> --}}
	</header>

	<main>
		@yield('layout_content')
	</main>

    <footer class="section-footer mt-auto mb-4 border-top">
		<div class="container-fluid">
			<div class="row border-top justify-content-center align-items-center pt-4">
				<div class="col-auto text-gray-500 font-weight-light">
					© 2022 Copyright: Holiyou
				</div>
			</div>
		</div>
	</footer>    

    <script src="{{ asset("assets/libraries/jquery/jquery-3.4.1.min.js") }}"></script>
	<script src="{{ asset("assets/libraries/bootstrap/js/bootstrap.js") }}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.8.0-beta.1/leaflet.js" integrity="sha512-35Se9CS+xsRdx551wuOxxQrJi/ZpmMn6CKYXALlsLCCH4y24H7YUrhFxPBO72Un8E3fXl8miMlZreP6/Vxr5mQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  @yield('layout_script')
</body>
</html>