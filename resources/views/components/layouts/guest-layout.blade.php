<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <!-- STYLES -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">

    <!-- --Swiper js -->
    <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" />
    @livewireStyles

    <!-- SCRIPTS -->
    <script src="{{ mix('js/app.js') }}" defer></script>
    <script type="text/javascript">
        //
    </script>

</head>

<body>
    <div class="flex min-h-screen flex-col" x-data="{ showCart: false }">
        @livewire('guest.navigation')
        @livewire('guest.cart')
        <main>
            {{ $slot }}
        </main>
        <x-guest.footer />
    </div>

    <!-- SCRIPTS -->
    <!-- --Swiper js -->
    <script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>
    @stack('scripts')
    @livewireScripts

</body>

</html>
