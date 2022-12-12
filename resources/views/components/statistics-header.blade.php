@props(['name','title', 'route_asc', 'route_desc'])

<div class="h-full w-[10rem] flex items-center sm:justify-start justify-center">
    <p class="text-[0.875rem] font-semibold font-inter text-dark-100 mr-2">
        {{ $title }}
    </p>
    @if(request()->query($name) && request()->query($name) === 'asc' )

        <x-flex.col class="justify-start h-[0.6rem]">

            <a href="{{ $route_asc }}" class="w-0 h-0
                          border-l-[5px] border-l-transparent
                          border-b-[5px] border-b-dark-100
                          border-r-[5px] border-r-transparent cursor-pointer">
            </a>

            <a href="{{ $route_desc }}" class="w-0 h-0
                            border-l-[5px] border-l-transparent
                            border-t-[5px] border-t-dark-40
                            border-r-[5px] border-r-transparent mt-[3px] cursor-pointer">
            </a>
        </x-flex.col>
    @elseif(request()->query($name) &&  request()->query($name) === 'desc')
        <x-flex.col class="justify-between h-[0.6rem]">

            <a href="{{ $route_asc }}" class="w-0 h-0
                          border-l-[5px] border-l-transparent
                          border-b-[5px] border-b-dark-40
                          border-r-[5px] border-r-transparent cursor-pointer">
            </a>

            <a href="{{ $route_desc }}" class="w-0 h-0
                            border-l-[5px] border-l-transparent
                            border-t-[5px] border-t-dark-100
                            border-r-[5px] border-r-transparent mt-[3px] cursor-pointer">
            </a>
        </x-flex.col>

    @else
        <x-flex.col class="justify-between h-[0.6rem]">

            <a href="{{ $route_asc }}" class="w-0 h-0
                          border-l-[5px] border-l-transparent
                          border-b-[5px] border-b-dark-40
                          border-r-[5px] border-r-transparent cursor-pointer">
            </a>

            <a href="{{ $route_desc }}" class="w-0 h-0
                            border-l-[5px] border-l-transparent
                            border-t-[5px] border-t-dark-40
                            border-r-[5px] border-r-transparent mt-[3px] cursor-pointer">
            </a>
        </x-flex.col>

    @endif
</div>
