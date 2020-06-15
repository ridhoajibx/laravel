<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
    <script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>
    <title>{{ $title ?? 'Laravel' }}</title>
</head>
<body>
    @include('layouts.navigation')
    <div class="py-4">
        @yield('content')
    </div>
</body>
</html>