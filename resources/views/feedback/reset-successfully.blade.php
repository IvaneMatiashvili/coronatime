<x-feedback-layout>

    <div class="flex flex-col justify-between items-center">
        <x-svg.feedback-icon/>

        <p class="font-normal text-dark-100 mt-4 text-[1.125rem]">{{ __('content.password-updated-successfully') }}</p>
        <a class="flex justify-center cursor-pointer items-center mt-[5.875rem] font-black text-[1rem] rounded-lg bg-green-button w-[24.5rem] h-[3.5rem] text-white"
            href="{{ route('login') }}"
        >
            {{ __('content.sign-in') }}
        </a>
    </div>
</x-feedback-layout>
