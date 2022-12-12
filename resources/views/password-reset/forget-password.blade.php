<x-feedback-layout>
    <x-flex.col class="w-[23rem] sm:w-[24.5rem]">
        <p class="font-black text-[1.563rem] text-dark-100">{{ __('content.reset-password') }}</p>
        <form method="POST" action="{{ route('forget.password.get') }}" enctype="multipart/form-data"
              class="w-full h-full">
            @csrf

            <div class="w-full mt-[5.188rem]">

                <x-form.label name="email" title="{{ __('content.email') }}"/>

                <div class="mt-1">
                    <x-flex.row>
                        <x-form.input name="email" type="text" placeholder="{{ __('content.enter-email') }}"/>
                        <div class="absolute left-[21.5rem] sm:left-[69.5rem] hidden mb-[1.25rem]">
                            <x-svg.approve-svg/>
                        </div>
                    </x-flex.row>
                    <x-form.password-reset-error name="email" class="absolute email-error" position="8"/>
                </div>
            </div>
            <x-flex.row class="justify-between w-full mt-[25rem] sm:mt-[1rem]">
                <x-form.button title="{{ __('content.reset-password') }}"/>
            </x-flex.row>
        </form>
    </x-flex.col>
</x-feedback-layout>
