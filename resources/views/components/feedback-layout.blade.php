<!doctype html>
<title>coronatime</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="shortcut icon" href="{{ asset('favicon.ico') }}">
@vite(['resources/css/app.css', 'resources/js/validation.js'])

<body class="w-full h-screen overflow-hidden">
    <header class="bg-yellow w-40 sm:w-screen h-[4rem] mt-[2rem] flex justify-start sm:justify-center ml-2 sm:ml-0">
        <x-svg.coronatime class=""/>
    </header>
    <div class="w-screen sm:w-full h-[45.75rem] flex flex-col justify-start sm:justify-center items-center">
        {{ $slot }}
    </div>
</body>
</html>
