<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<!-- title -->
	<title> @yield('title')</title>

	<!-- Fonts -->
	<link rel="preconnect" href="https://fonts.bunny.net">
	<link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
	<link
		href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400..700&family=Noto+Sans+JP:wght@100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
		rel="stylesheet">

	<!-- bootsrap -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
		integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

	<!-- Scripts -->
	@vite(['resources/css/app.css', 'resources/css/styles.css', 'resources/sass/app.scss', 'resources/js/app.js'])

</head>

<body class="font-sans antialiased">
	<div class="min-h-screen bg-gray-100">

		<!-- Page Heading -->
		<header style="position: fixed; width:100%; height:17%; top:0; z-index:1000;">
			@include('parts.header')
			@yield('header')
		</header>

		<!-- Page Content -->
		<main style="position:absolute; top:17%">
			@yield('content')
		</main>

		<!-- Footer -->
		<footer>
			@yield('footer')
		</footer>

	</div>
</body>

</html>
