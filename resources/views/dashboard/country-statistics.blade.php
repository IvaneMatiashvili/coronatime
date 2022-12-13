<x-dashboard-layout title="{{ __('content.statistic-by-country') }}" content="country-statistics"
                    username="{{ $user->name }}">

    <form action="{!! route('dashboard.country-statistics', ['search' => request('search')]) !!}"
          method="GET">
                @if(request()->query('country'))
                    <input type="hidden" name="country" value="{{ request()->query('country') }}">
                @elseif(request()->query('confirmed'))
                    <input type="hidden" name="confirmed" value="{{ request()->query('confirmed') }}">
                @elseif(request()->query('deaths'))
                    <input type="hidden" name="deaths" value="{{ request()->query('deaths') }}">
                @elseif(request()->query('recovered'))
                    <input type="hidden" name="recovered" value="{{ request()->query('recovered') }}">
                @endif
        <div class="flex flex-row-reverse border border-dark-20 w-[18rem] h-[3rem] items-center justify-center sm:ml-[9.25rem] ml-4 rounded-lg mt-[3.438rem]">
            <input type="search" name="search"  placeholder="{{ __('content.search-by-country') }}"
                   value="{{ request()->query('search') }}"
                   class="placeholder-dark-60 ring-offset-0 placeholder-4 placeholder-dark font-inter text-dark-100 h-[2.5rem] outline-none w-[12rem] border-transparent focus:border-transparent focus:shadow-transparent focus:ring-offset-0"/>
            <button type="submit">
                <x-svg.search/>
            </button>
        </div>
    </form>

    <div class="sm:w-[104rem] w-[23rem] bg-dark-4 h-[3.5rem] sm:ml-[9.25rem] ml-4 mt-[2.5rem] rounded-t-lg">
        <x-flex.row class="sm:ml-[2.5rem] break-all ml-0 h-full sm:w-[80rem] w-[23rem] justify-between">
            @if(request()->query('country') === 'asc')
                <x-statistics-header name="country" title="{{ __('content.location') }}"
                                     route_asc="{!! route('dashboard.country-statistics',['country=desc', 'search' => request('search')]) !!}"
                                     route_desc="{!! route('dashboard.country-statistics',['country=desc', 'search' => request('search')]) !!}"/>
            @elseif((request()->query('country') === 'desc'))
                <x-statistics-header name="country" title="{{ __('content.location') }}"
                                     route_asc="{!! route('dashboard.country-statistics', ['country=asc', 'search' => request('search')]) !!}"
                                     route_desc="{!! route('dashboard.country-statistics', ['country=asc', 'search' => request('search')]) !!}"/>
            @else
                <x-statistics-header name="country" title="{{ __('content.location') }}"
                                     route_asc="{!! route('dashboard.country-statistics', ['country'=>'asc', 'search' => request('search')]) !!}"
                                     route_desc="{!! route('dashboard.country-statistics', ['country=desc', 'search' => request('search')]) !!}"/>
            @endif
            @if((request()->query('confirmed') === 'asc'))
                <x-statistics-header name="confirmed" title="{{ __('content.new-cases') }}"
                                     route_asc="{!! route('dashboard.country-statistics', ['confirmed=desc', 'search' => request('search')]) !!}"
                                     route_desc="{!! route('dashboard.country-statistics', ['confirmed=desc', 'search' => request('search')]) !!}"/>
            @elseif((request()->query('confirmed') === 'desc'))
                <x-statistics-header name="confirmed" title="{{ __('content.new-cases') }}"
                                     route_asc="{!! route('dashboard.country-statistics', ['confirmed=asc', 'search' => request('search')]) !!}"
                                     route_desc="{!! route('dashboard.country-statistics', ['confirmed=asc', 'search' => request('search')]) !!}"/>
            @else
                <x-statistics-header name="confirmed" title="{{ __('content.new-cases') }}"
                                     route_asc="{!! route('dashboard.country-statistics', ['confirmed=asc', 'search' => request('search')]) !!}"
                                     route_desc="{!! route('dashboard.country-statistics', ['confirmed=desc', 'search' => request('search')]) !!}"/>
            @endif
            @if((request()->query('deaths') === 'asc'))
                <x-statistics-header name="deaths" title="{{ __('content.deaths') }}"
                                     route_asc="{!! route('dashboard.country-statistics', ['deaths=desc', 'search' => request('search')]) !!}"
                                     route_desc="{!! route('dashboard.country-statistics', ['deaths=desc', 'search' => request('search')]) !!}"/>
            @elseif((request()->query('deaths') === 'desc'))
                <x-statistics-header name="deaths" title="{{ __('content.deaths') }}"
                                     route_asc="{!! route('dashboard.country-statistics', ['deaths=asc', 'search' => request('search')]) !!}"
                                     route_desc="{!! route('dashboard.country-statistics', ['deaths=asc', 'search' => request('search')]) !!}"/>
            @else
                <x-statistics-header name="deaths" title="{{ __('content.deaths') }}"
                                     route_asc="{!! route('dashboard.country-statistics', ['deaths=asc','search' => request('search')]) !!}"
                                     route_desc="{!! route('dashboard.country-statistics', ['deaths=desc', 'search' => request('search')]) !!}"/>
            @endif
            @if((request()->query('recovered') === 'asc'))
                <x-statistics-header name="recovered" title="{{ __('content.recovered') }}"
                                     route_asc="{!! route('dashboard.country-statistics', ['recovered=desc', 'search' => request('search')]) !!}"
                                     route_desc="{!! route('dashboard.country-statistics', ['recovered=desc', 'search' => request('search')]) !!}"/>
            @elseif((request()->query('recovered') === 'desc'))
                <x-statistics-header name="recovered" title="{{ __('content.recovered') }}"
                                     route_asc="{!! route('dashboard.country-statistics', ['recovered=asc', 'search' => request('search')]) !!}"
                                     route_desc="{!!  route('dashboard.country-statistics', ['recovered=asc', 'search' => request('search')]) !!}"/>
            @else
                <x-statistics-header name="recovered" title="{{ __('content.recovered') }}"
                                     route_asc="{!! route('dashboard.country-statistics', ['recovered=asc', 'search' => request('search')]) !!}"
                                     route_desc="{!! route('dashboard.country-statistics', ['recovered=desc', 'search' => request('search')]) !!}"/>
            @endif
        </x-flex.row>
    </div>
    <div class="sm:w-[104rem] w-[23rem] sm:h-[28rem] h-[20rem] sm:ml-[9.25rem] ml-4 overflow-y-scroll overflow-x-hidden border-b border-dark-4 border-x scrollbar">
        @if(!request()->query('search'))
            <div class="sm:w-[104rem] w-[23rem] bg-white h-[3.5rem] border-b border-dark-4">
                <x-flex.row class="sm:ml-[2.5rem] ml-0 h-full sm:w-[80rem] w-[23rem] justify-between">
                    <x-statistics-content info="{{ $worldwide['name'] }}" class="ml-2 sm:ml-0"/>
                    <x-statistics-content info="{{ number_format((float)$worldwide['confirmed']) }}" class="ml-[0.3rem] sm:ml-0"/>
                    <x-statistics-content info="{{ number_format((float)$worldwide['deaths']) }}" class="ml-[1.2rem] sm:ml-0"/>
                    <x-statistics-content info="{{ number_format((float)$worldwide['recovered']) }}"/>
                </x-flex.row>
            </div>
        @endif

        @foreach($statistics as $statistic)
            <div class="sm:w-[104rem] w-[23rem] bg-white h-[3.5rem] border-b border-dark-4">
                <x-flex.row class="sm:ml-[2.5rem] ml-0 h-full sm:w-[80rem] w-[23rem] justify-between">
                    <x-statistics-content info="{{ $statistic->country }}" class="ml-2 sm:ml-0"/>
                    <x-statistics-content info="{{ number_format((float)$statistic->confirmed) }}" class="ml-[0.3rem] sm:ml-0"/>
                    <x-statistics-content info="{{ number_format((float)$statistic->deaths) }}" class="ml-[1.2rem] sm:ml-0"/>
                    <x-statistics-content info="{{ number_format((float)$statistic->recovered) }}"/>
                </x-flex.row>
            </div>
        @endforeach
    </div>

</x-dashboard-layout>
