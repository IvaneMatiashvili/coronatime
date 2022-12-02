<x-dashboard-layout title="Worldwide Statistics" content="worldwide" username="{{ $user->name }}">

    <x-flex.row class="w-[80rem] h-[15.938rem] ml-[9.25rem] justify-between mt-[2.5rem]">
        <x-flex.col class="w-[24.5rem] h-[15.938rem] bg-blue-bg bg-cover rounded-3xl bg-no-repeat bg-fixed">
            <x-svg.new-cases-svg/>
            <p class="font-medium text-[1.25rem] text-dark-100 h-[4rem]">New cases</p>
            <p class="font-black text-[2.5rem] text-blue-cases h-[4rem]">{{ number_format((float)$worldwide->confirmed) }}</p>

        </x-flex.col>
        <x-flex.col class="w-[24.5rem] h-[15.938rem] bg-green-bg bg-cover rounded-3xl bg-no-repeat bg-fixed">
            <x-svg.recovered-svg/>
            <p class="font-medium text-[1.25rem] text-dark-100 h-[4rem]">Recovered</p>
            <p class="font-black text-[2.5rem] text-green-recovered h-[4rem]">{{ number_format((float)$worldwide->deaths) }}</p>

        </x-flex.col>
        <x-flex.col class="w-[24.5rem] h-[15.938rem] bg-yellow-bg bg-cover rounded-3xl bg-no-repeat bg-fixed">
            <x-svg.death-svg/>
            <p class="font-medium text-[1.25rem] text-dark-100 h-[4rem]">Death</p>
            <p class="font-black text-[2.5rem] text-yellow-death h-[4rem]">{{ number_format((float)$worldwide->recovered) }}</p>
        </x-flex.col>
    </x-flex.row>

</x-dashboard-layout>