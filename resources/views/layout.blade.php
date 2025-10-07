
<!-- resources/views/layouts/app.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('pageTitle', 'MyStore')</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    @stack('styles')
</head>
<body>

{{-- Include Navbar --}}
@include('nav')

{{-- Page Content --}}
<div class="container content-wrapper">
    @yield('pagecontent')
</div>

{{-- Footer --}}
<footer class="text-center p-3 bg-dark text-light">
    Copyright ©2025 MyStore
</footer>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
@stack('scripts')
</body>
</html>

