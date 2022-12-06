<x-feedback-layout>
    <x-flex.col>
        <p class="font-black text-[1.563rem] text-dark-100">{{ __('content.reset-password') }}</p>
    <form method="POST" action="{{ route('forget.password.get') }}" enctype="multipart/form-data" class="w-full h-full">
        @csrf

        <div class="w-full mt-[5.188rem]">

            <x-form.label name="email" title="{{ __('content.email') }}"/>

            <div class="mt-1">
                <x-form.input name="email" type="email" placeholder="{{ __('content.enter-email') }}"/>
                <x-form.error name="email" class="left-[50rem]"/>
            </div>
        </div>
        <x-flex.row class="justify-between w-full mt-[1rem]">
            <x-form.button title="{{ __('content.reset-password') }}"/>
        </x-flex.row>
    </form>
    </x-flex.col>
</x-feedback-layout>
