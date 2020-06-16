<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
    <title>{{ $title ?? 'Laravel-sev' }}</title>
</head>
<body>
    @include('layouts.navigation')
    <div class="py-4">
        @include('alert')
        @yield('content')
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>
</body>
</html>