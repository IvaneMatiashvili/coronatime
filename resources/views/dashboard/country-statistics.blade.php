<x-dashboard-layout title="Statistics by country" content="country-statistics" username="{{ $user->name }}">

    <form action="{{ route('dashboard.country-statistics') }}" method="GET">
        @if(request()->query('country'))
            <input type="hidden" name="country" value="{{ request()->query('country') }}">
        @elseif(request()->query('confirmed'))
            <input type="hidden" name="confirmed" value="{{ request()->query('confirmed') }}">
        @elseif(request()->query('deaths'))
            <input type="hidden" name="deaths" value="{{ request()->query('deaths') }}">
        @elseif(request()->query('recovered'))
            <input type="hidden" name="recovered" value="{{ request()->query('recovered') }}">
        @endif

        <div class="flex flex-row-reverse border border-dark-20 w-[15rem] h-[3rem] items-center justify-center ml-[9.25rem] rounded-lg mt-[3.438rem]">
            <input type="text" name="search" placeholder="Search by country " value="{{ old('search') }}"
                   class="placeholder-dark-60 ring-offset-0 placeholder-4 placeholder-dark text-dark-100 h-[2.5rem] outline-none w-[10rem] border-transparent focus:border-transparent focus:shadow-transparent focus:ring-offset-0"/>
            <button type="submit">
                <x-svg.search/>
            </button>
        </div>
    </form>

    <div class="w-[76.5rem] bg-dark-4 h-[3.5rem] ml-[9.25rem] mt-[2.5rem] rounded-t-lg">
        <x-flex.row class="ml-[2.5rem] h-full w-[48.125rem] justify-between">
            <x-statistics-header name="country" title="Location"
                                 route_asc="{{ route('dashboard.country-statistics') . '?country=asc' }} & {{ http_build_query(request()->except(['country', 'confirmed','deaths', 'recovered'])) }}"
                                 route_desc="{{ route('dashboard.country-statistics') . '?country=desc' }} & {{ http_build_query(request()->except(['country', 'confirmed','deaths', 'recovered'])) }}"/>

            <x-statistics-header name="confirmed" title="New cases"
                                 route_asc="{{ route('dashboard.country-statistics') . '?confirmed=asc' }} & {{ http_build_query(request()->except(['country', 'confirmed','deaths', 'recovered'])) }}"
                                 route_desc="{{ route('dashboard.country-statistics') . '?confirmed=desc' }} & {{ http_build_query(request()->except(['country', 'confirmed','deaths', 'recovered'])) }}"/>

            <x-statistics-header name="deaths" title="Deaths"
                                 route_asc="{{ route('dashboard.country-statistics') . '?deaths=asc' }} & {{ http_build_query(request()->except(['country', 'confirmed','deaths', 'recovered'])) }}"
                                 route_desc="{{ route('dashboard.country-statistics') . '?deaths=desc' }} & {{ http_build_query(request()->except(['country', 'confirmed','deaths', 'recovered'])) }}"/>

            <x-statistics-header name="recovered" title="Recovered"
                                 route_asc="{{ route('dashboard.country-statistics') . '?recovered=asc' }} & {{ http_build_query(request()->except(['country', 'confirmed','deaths', 'recovered'])) }}"
                                 route_desc="{{ route('dashboard.country-statistics') . '?recovered=desc' }} & {{ http_build_query(request()->except(['country', 'confirmed','deaths', 'recovered'])) }}"/>
        </x-flex.row>
    </div>
    <div class="w-[76.5rem] h-[28rem] ml-[9.25rem] overflow-y-scroll overflow-x-hidden border-b border-dark-4 border-x scrollbar">
        @if(!request()->query('search'))
            <div class="w-[76.5rem] bg-white h-[3.5rem] border-b border-dark-4">
                <x-flex.row class="ml-[2.5rem] h-full w-[48.125rem] justify-between">
                    <x-statistics-content info="{{ $worldwide['name'] }}"/>
                    <x-statistics-content info="{{ number_format((float)$worldwide['confirmed']) }}"/>
                    <x-statistics-content info="{{ number_format((float)$worldwide['deaths']) }}"/>
                    <x-statistics-content info="{{ number_format((float)$worldwide['recovered']) }}"/>
                </x-flex.row>
            </div>
        @endif

        @foreach($statistics as $statistic)
            <div class="w-[76.5rem] bg-white h-[3.5rem] border-b border-dark-4">
                <x-flex.row class="ml-[2.5rem] h-full w-[48.125rem] justify-between">
                    <x-statistics-content info="{{ $statistic->country }}"/>
                    <x-statistics-content info="{{ number_format((float)$statistic->confirmed) }}"/>
                    <x-statistics-content info="{{ number_format((float)$statistic->deaths) }}"/>
                    <x-statistics-content info="{{ number_format((float)$statistic->recovered) }}"/>
                </x-flex.row>
            </div>
        @endforeach
    </div>

</x-dashboard-layout>
