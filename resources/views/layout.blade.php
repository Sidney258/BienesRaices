<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
    @vite('resources/css/app.css')
    <script src="//unpkg.com/alpinejs" defer></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <title>Bienes Raices</title>
</head>

<body class="mx-auto">

    <x-header />
    @if (request()->is('/'))
        <x-hero />
    @endif
    <main class="container mx-auto p-4 mt-4">
        {{-- Display alert messages --}}
        @if (session('success'))
            <x-alert type="success" message="{{ session('success') }}" />
        @endif
        @if (session('error'))
            <x-alert type="error" message="{{ session('error') }}" />
        @endif
        {{ $slot }}
    </main>
    <footer class="footer text-center py-10">
        <p class="text-black">Copyright &copy; {{ date('Y') }} BienesRaices. todos os direitos reservados</p>
    </footer>
    <script src="https://kit.fontawesome.com/5870468acd.js" crossorigin="anonymous"></script>
</body>

</html>
