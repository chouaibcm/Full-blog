<!DOCTYPE html>
<html>
<head>
	<!-- Basic Page Info -->
	<meta charset="utf-8">
	<title>ZAKEM</title>

	<!-- Site favicon -->
	<link rel="apple-touch-icon" sizes="180x180" href="{{asset('img/zakem1.png')}}">
	<link rel="icon" type="image/png" sizes="32x32" href="{{asset('img/zakem1.png')}}">
	<link rel="icon" type="image/png" sizes="16x16" href="{{asset('img/zakem1.png')}}">

	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!-- Google Font -->
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
	<!-- CSS -->
	<link rel="stylesheet" type="text/css"  href="{{asset('backend/vendors/styles/core.css')}}">
	<link rel="stylesheet" type="text/css"  href="{{asset('backend/vendors/styles/icon-font.min.css')}}">
	<link rel="stylesheet" type="text/css"  href="{{asset('backend/src/plugins/datatables/css/dataTables.bootstrap4.min.css')}}">
	<link rel="stylesheet" type="text/css"  href="{{asset('backend/src/plugins/datatables/css/responsive.bootstrap4.min.css')}}">
    <link rel="stylesheet" type="text/css"  href="{{asset('backend/vendors/styles/style.css')}}">
    @yield('css')

</head>
<body>
	<div class="header">
		<div class="header-left">
			<div class="menu-icon dw dw-menu"></div>

		</div>
		<div class="header-right">
			
			<div class="user-info-dropdown">
				<div class="dropdown">
					<a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
						<span class="user-name">{{ Auth::user()->name }}</span>
					</a>
					<div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                        <a class="dropdown-item" href="{{ route('users.edit-profile') }}">
                            My Profile
                        </a>
						<a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
						document.getElementById('logout-form').submit();"><i class="dw dw-logout"></i> Log Out</a>
						<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
							@csrf
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>

	
	<div class="left-side-bar">
		<div class="brand-logo">
			<a href="{{ route('welcome') }}">
				<img class="logo-dark" src="{{asset('img/zakem1.png')}}" width="200" height="200" alt="logo">
			</a>
			<div class="close-sidebar" data-toggle="left-sidebar-close">
				<i class="ion-close-round"></i>
			</div>
		</div>
		<div class="menu-block customscroll">
			<div class="sidebar-menu">
				<ul id="accordion-menu">
					@if (Auth()->user()->isAdmin())
					<li class="dropdown">

						<a href="{{route('users.index')}}" class="dropdown-toggle no-arrow">
							<span class="micon dw dw-user-12"></span><span class="mtext">Users</span>
						</a>
					</li>
					@endif

					<li class="dropdown">
						<a href="{{ Route('posts.index')}}" class="dropdown-toggle no-arrow">
							<span class="micon dw dw-newspaper-1"></span><span class="mtext">Posts</span>
						</a>
					</li>
					<li class="dropdown">
						<a href="{{ Route('tags.index')}}" class="dropdown-toggle no-arrow">
							<span class="micon dw dw-tag-1"></span><span class="mtext">Tags</span>
						</a>
					</li>
					<li>
						<a href="{{ Route('categories.index')}}" class="dropdown-toggle no-arrow">
							<span class="micon dw dw-list"></span><span class="mtext">Categories</span>
						</a>
					</li>
					<li class="dropdown mt-5">
						<a href="{{ Route('trashed-posts.index')}}" class="dropdown-toggle no-arrow">
							<span class="micon dw dw-trash"></span><span class="mtext"> Trashed Posts </span>
						</a>
					</li>
					
				</ul>
			</div>
		</div>
	</div>
	<div class="mobile-menu-overlay"></div>

	<div class="main-container">
	 <div class="page-content">
	  <div class="pd-ltr-20">
	         @if(session()->has('success'))
                 <div class="alert alert-success">
                    {{ session()->get('success')}}
                 </div>
                @endif
                @if(session()->has('error'))
                 <div class="alert alert-danger">
                    {{ session()->get('error')}}
                 </div>
                @endif
			@yield('content')
		</div>
	 </div>
		
	</div>
	<!-- js -->
	<script  src="{{asset('backend/vendors/scripts/core.js')}}"></script>
	<script  src="{{asset('backend/vendors/scripts/script.min.js')}}"></script>
	<script  src="{{asset('backend/vendors/scripts/process.js')}}"></script>
	<script src="{{asset('backend/vendors/scripts/layout-settings.js')}}"></script>
	<script  src="{{asset('backend/src/plugins/apexcharts/apexcharts.min.js')}}"></script>
	<script src="{{asset('backend/src/plugins/datatables/js/jquery.dataTables.min.js')}}"></script>
	<script  src="{{asset('backend/src/plugins/datatables/js/dataTables.bootstrap4.min.js')}}"></script>
	<script  src="{{asset('backend/src/plugins/datatables/js/dataTables.responsive.min.js')}}"></script>
	<script  src="{{asset('backend/src/plugins/datatables/js/responsive.bootstrap4.min.js')}}"></script>
    <script  src="{{asset('backend/vendors/scripts/dashboard.js')}}"></script>
    @yield('scripts');
</body>
</html>