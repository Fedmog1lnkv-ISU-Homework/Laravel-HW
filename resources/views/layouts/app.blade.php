<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $pageTitle ?? 'Laravel-HW' }}</title>
</head>

<body>
    @include('partials.header', ['pageTitle' => $pageTitle])
    
    <div class="content">
        @yield('content')
    </div>

    @include('partials.footer')
</body>

</html>
