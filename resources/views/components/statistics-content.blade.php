@props(['info'])
<x-flex.row class="h-full w-[6rem]">
    <p class="text-[0.875rem] font-normal text-dark-100 w-full">
        {{ $info }}
    </p>

    <x-flex.col class="justify-between h-[0.6rem] ml-[0.563rem]">

        <div class="w-0 h-0
                          border-l-[5px] border-l-transparent
                          border-b-[5px] border-b-transparent
                          border-r-[5px] border-r-transparent">
        </div>

        <div class="w-0 h-0
                            border-l-[5px] border-l-transparent
                            border-t-[5px] border-t-transparent
                            border-r-[5px] border-r-transparent mt-[3px]">
        </div>
    </x-flex.col>
</x-flex.row>
