@props(['title', 'content', 'username'])

<!doctype html>
<title>coronatime</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
 @vite(['resources/css/app.css', 'resources/js/app.js'])

<body class="w-full h-screen">
<div>
    <x-header username="{{ $username }}"/>

    <p class="text-dark-100 font-extrabold text-[1.563rem] ml-[9.25rem] mt-[2.5rem]">{{ $title }}</p>
    @if($content === 'worldwide')
        @if(App::getLocale() === 'ka')
        <x-flex.row class="w-[18rem] justify-between ml-[9.25rem] mt-[2.5rem]">
            <div>
                <a class="text-[1rem] text-dark-100 font-bold" href="{{ route('dashboard') }}">{{ __('content.worldwide') }}</a>
                <div class="border-2 w-[6rem] border-dark-100 mt-4"></div>
            </div>
            <div>
                <a class="font-normal text-[1rem] text-dark-100" href="{{ route('dashboard.country-statistics') }}">{{ __('content.by-country') }}</a>
                <div class="border-2 w-[5rem] border-white mt-4"></div>
            </div>
        </x-flex.row>
            @else
            <x-flex.row class="w-[13rem] justify-between ml-[9.25rem] mt-[2.5rem]">
                <div>
                    <a class="text-[1rem] text-dark-100 font-bold" href="{{ route('dashboard') }}">{{ __('content.worldwide') }}</a>
                    <div class="border-2 w-[5rem] border-dark-100 mt-4"></div>
                </div>
                <div>
                    <a class="font-normal text-[1rem] text-dark-100" href="{{ route('dashboard.country-statistics') }}">{{ __('content.by-country') }}</a>
                    <div class="border-2 w-[5rem] border-white mt-4"></div>
                </div>
            </x-flex.row>
        @endif
    @else
            @if(App::getLocale() === 'ka')
        <x-flex.row class="w-[18rem] justify-between ml-[9.25rem] mt-[2.5rem]">
            <div>
                <a class="font-normal text-[1rem] text-dark-100" href="{{ route('dashboard') }}">{{ __('content.worldwide') }}</a>
                <div class="border-2 w-[5rem] border-white mt-4"></div>
            </div>
            <div>
                <a class="text-[1rem] text-dark-100 font-bold" href="{{ route('dashboard.country-statistics') }}">{{ __('content.by-country') }}</a>
                <div class="border-2 w-[10rem] border-dark-100 mt-4"></div>
            </div>
        </x-flex.row>
        @else
            <x-flex.row class="w-[13rem] justify-between ml-[9.25rem] mt-[2.5rem]">
                <div>
                    <a class="font-normal text-[1rem] text-dark-100" href="{{ route('dashboard') }}">{{ __('content.worldwide') }}</a>
                    <div class="border-2 w-[5rem] border-white mt-4"></div>
                </div>
                <div>
                    <a class="text-[1rem] text-dark-100 font-bold" href="{{ route('dashboard.country-statistics') }}">{{ __('content.by-country') }}</a>
                    <div class="border-2 w-[5rem] border-dark-100 mt-4"></div>
                </div>
            </x-flex.row>
                @endif

    @endif
    <div>
        {{ $slot }}
    </div>
</div>
</body>
</html>
