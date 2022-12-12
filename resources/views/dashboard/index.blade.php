<x-dashboard-layout title="{{ __('content.worldwide-statistic') }}" content="worldwide" username="{{ $user->name }}">

    <div class="sm:h-[15.938rem] h-[32rem] sm:ml-[9.25rem] flex sm:flex-row flex-col justify-start font-inter items-center mt-[2.5rem]">
        <div class="sm:w-[25rem] w-[23rem] h-[15.938rem] flex flex-col items-center justify-center bg-blue-bg bg-cover bg-center bg-fixed rounded-3xl bg-no-repeat ">
            <x-svg.new-cases-svg/>
            <p class="font-medium text-[1.25rem] text-dark-100 font-inter h-[4rem]">{{ __('content.new-cases') }}</p>
            <p class="font-black text-[2.5rem] text-blue-cases font-inter h-[4rem]">{{ number_format((float)$worldwide['confirmed']) }}</p>

        </div>
        <x-flex.row class="justify-between w-[23rem] sm:w-[60rem] sm:mt-0 mt-8">
            <x-flex.col class="sm:w-[25rem] break-all w-[11rem] h-[15.938rem] bg-green-bg bg-cover sm:ml-[5rem] ml-0 rounded-3xl bg-center bg-fixed  bg-no-repeat">
                <x-svg.recovered-svg/>
                <p class="font-medium text-[1.25rem] font-inter text-dark-100 h-[4rem]">{{ __('content.recovered') }}</p>
                <p class="font-black text-[2.5rem] text-green-recovered font-inter h-[4rem]">{{ number_format((float)$worldwide['deaths']) }}</p>

            </x-flex.col>
            <x-flex.col class="sm:w-[25rem] break-all w-[11rem] h-[15.938rem] bg-yellow-bg bg-cover sm:ml-[5rem] rounded-3xl bg-center bg-fixed  bg-no-repeat">
                <x-svg.death-svg/>
                <p class="font-medium text-[1.25rem] font-inter text-dark-100 h-[4rem]">{{ __('content.deaths') }}</p>
                <p class="font-black text-[2.5rem] text-yellow-death font-inter h-[4rem]">{{ number_format((float)$worldwide['recovered']) }}</p>
            </x-flex.col>
        </x-flex.row>
    </div>

</x-dashboard-layout>