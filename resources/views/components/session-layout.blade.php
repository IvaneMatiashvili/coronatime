<!doctype html>
<title>coronatime</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="shortcut icon" href="{{ asset('favicon.ico') }}">
@vite(['resources/css/app.css', 'resources/js/app.js', 'resources/js/validation.js'])

<body class="w-full h-screen flex justify-between overflow-hidden">
    <div>
        <header class="bg-yellow h-[4rem] flex justify-start items-center">
            <x-svg.coronatime class="ml-2 sm:ml-[9.25rem] mt-[2.5rem]"/>
            <x-flex.row class="w-[7rem] h-[1.875rem] mr-[3.125rem] mt-[2.5rem] ml-[1rem]">
                <P class="mr-2 font-normal font-inter text-4 text-dark-100">
                    @if( App::getLocale() === 'ka')
                        {{ __('content.georgian') }}
                    @else
                        {{ __('content.english') }}
                    @endif
                </P>

                <x-svg.arrow-svg class="cursor-pointer lang-arrow"/>
                <x-flex.col
                        class="absolute top-[4rem] w-[10rem] justify-start items-start bg-gray-200 lang-container hidden">
                    <x-flex.row class="w-[10rem] h-[1.875rem] border border-dark-60 border-b-0">
                        <a class="cursor-pointer font-inter w-full h-full flex justify-center items-center font-normal text-4 text-dark-100"
                           href="{{ route('lang.switch', 'en') }}">
                            {{ __('content.english') }}
                        </a>
                    </x-flex.row>
                    <x-flex.row class="w-[10rem] border border-dark-60">
                        <a class="cursor-pointer font-inter w-full h-full flex justify-center items-center font-normal text-4 text-dark-100"
                           href="{{ route('lang.switch', 'ka') }}">
                            {{ __('content.georgian') }}
                        </a>
                    </x-flex.row>
                </x-flex.col>
            </x-flex.row>
        </header>
        <div class="w-screen sm:w-full  h-[45.75rem] flex justify-center items-start sm:justify-start sm:items-start">
             {{ $slot }}
        </div>
    </div>
    <div class="hidden justify-end w-full sm:flex">
        <img src="/images/corona-img.png" class="min-h-screen w-[50rem] lg:block sm:hidden" alt="corona img">
    </div>
</body>
</html>