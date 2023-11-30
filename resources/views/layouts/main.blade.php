<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href="{{ asset('css/main.css') }}">
	<link rel="stylesheet" href="{{ asset('css/note.css') }}">
	<link rel="stylesheet" href="{{ asset('css/user.css') }}">
	{{-- <link rel="stylesheet" href="{{ asset('css/header.css') }}">
	<link rel="stylesheet" href="{{ asset('css/footer.css') }}"> --}}
	<title>Document</title>
</head>
<body>
	<div class="app">
		@include('partials.header', ['pageTitle' => $pageTitle])
		<div class="wrapper">
			<div class="inner">
				@yield('content')
			</div>
		</div>
	</div>
	@include('partials.footer')
	@yield('js')
</body>
</html>