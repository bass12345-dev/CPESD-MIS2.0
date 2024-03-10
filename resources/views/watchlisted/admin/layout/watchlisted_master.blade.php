<!DOCTYPE html>
<html lang="en">
<head>
	@include('global_includes.meta')
	@include('watchlisted.includes.css')
</head>
<body>
	<div class="wrapper">
		@include('watchlisted.admin.layout.watchlisted_includes.watchlisted_sidebar')
		<div class="main">
			@include('watchlisted.admin.layout.watchlisted_includes.watchlisted_topbar')
			<main class="content">
				<div class="container-fluid p-0">
					@yield('content')
				</div>
			</main>
		</div>
	</div>
</body>
@include('global_includes.js')
@yield('js')
@include('global_includes.js_.wl_script')
</html>