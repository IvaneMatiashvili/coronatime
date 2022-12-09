@props(['username'])
<header class="bg-yellow w-full h-[5rem] flex justify-between items-center">
    <x-svg.coronatime class="ml-[9.25rem]"/>
    <div class="flex justify-between items-center mr-[6.75rem]">
        <x-flex.row class="w-[7rem] h-[1.875rem] mr-[3.125rem]">
            <P class="mr-2 font-normal text-4 text-dark-100">
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
                    <a class="cursor-pointer w-full h-full flex justify-center items-center font-normal text-4 text-dark-100"
                       href="{{ route('lang.switch', 'en') }}">
                         {{ __('content.english') }}
                    </a>
                </x-flex.row>
                <x-flex.row class="w-[10rem] border border-dark-60">
                    <a class="cursor-pointer w-full h-full flex justify-center items-center font-normal text-4 text-dark-100"
                       href="{{ route('lang.switch', 'ka') }}">
                        {{ __('content.georgian') }}
                    </a>
                </x-flex.row>
            </x-flex.col>
        </x-flex.row>
        <p class="mr-4 font-bold text-[1rem]">
            {{ $username }}
        </p>
        <span class="border border-dark-20 h-[2rem] mr-4"></span>
        <form method="get" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="hover:overline font-medium text-dark-100 text-[0.875rem] cursor-pointer">
                {{ __('content.logout') }}
            </button>
        </form>
    </div>
</header>
<div class="border border-dark-4 w-full"></div>

