<!doctype html>
<title>coronatime</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
@vite('resources/css/app.css')

<body class="w-full h-screen flex justify-between">
    <div>
        <header class="bg-yellow w-[52.25] h-[4rem]">
            <x-svg.coronatime class="ml-[9.25rem] mt-[2.5rem]"/>
        </header>
        <div class="w-full h-[45.75rem] flex justify-start items-start">
             {{ $slot }}
        </div>
    </div>
    <div class="flex justify-end w-full">
        <img src="/images/corona-img.png" class="min-h-screen w-[50rem]" alt="corona img">
    </div>
</body>
</html>