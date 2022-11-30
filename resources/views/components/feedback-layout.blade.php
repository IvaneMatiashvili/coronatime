<!doctype html>
<title>coronatime</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
@vite('resources/css/app.css')

<body class="w-full h-screen">
    <header class="bg-yellow w-screen h-[4rem] flex justify-center">
        <x-svg.coronatime/>
    </header>
    <div class="w-full h-[45.75rem] flex flec-col justify-center items-center">
        {{ $slot }}
    </div>
</body>
</html>
