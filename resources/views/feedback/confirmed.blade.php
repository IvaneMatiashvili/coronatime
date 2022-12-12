<x-feedback-layout>

    <div class="flex flex-col justify-between items-center mt-[16.75rem] sm:mt-0">
        <x-svg.feedback-icon/>

        <p class="font-normal text-dark-100 font-inter mt-4 text-[1.125rem]">{{ __('content.account-confirmed') }}</p>
        <a class="flex justify-center cursor-pointer font-inter items-center font-black text-[1rem] rounded-lg bg-green-button mt-[18rem] sm:mt-[5.875rem] w-[23rem] sm:w-[24.5rem] h-[3.5rem] text-white"
            href="{{ route('login') }}"
        >
            {{ __('content.sign-in') }}
        </a>
    </div>
</x-feedback-layout>
