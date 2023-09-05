<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ Route::currentRouteName() }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
    <script src="https://kit.fontawesome.com/6810813e1c.js" crossorigin="anonymous"></script>
</head>

<body>
    <x-navbar />

    <x-flash />
    {{ $slot }}

    @livewireScripts
</body>

</html>
