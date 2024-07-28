<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Khmer+M1&display=swap" rel="stylesheet">

</head>
<body class="font-sans antialiased dark:bg-slate-900">
    <header>
        <!-- Your header content -->
    </header>

    <main>
        @yield('content')
    </main>

    <footer>
        <!-- Your footer content -->
    </footer>

    <!-- Include your JS files here -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
