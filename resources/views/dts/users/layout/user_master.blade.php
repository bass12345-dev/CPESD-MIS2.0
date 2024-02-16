<!DOCTYPE html>
<html lang="en">
<head>
	@include('dts.includes.meta')
	@include('dts.includes.css')
</head>
<body>
	<div class="wrapper">
		@include('dts.users.layout.user_includes.user_sidebar')
		<div class="main">
			@include('dts.users.layout.user_includes.user_topbar')
			<main class="content">
				<div class="container-fluid p-0">
					@yield('content')
				</div>
			</main>
		</div>
	</div>
</body>
@include('dts.includes.js')
@yield('js')

</html>