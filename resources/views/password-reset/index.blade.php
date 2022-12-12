<x-feedback-layout>
    <x-flex.col class="w-[23rem] sm:w-[24.5rem]">
        <p class="font-black text-[1.563rem] text-dark-100">{{ __('content.reset-password') }}</p>
        <form method="POST" action="{{ route('reset.password.post', $token) }}" enctype="multipart/form-data"
              class="w-full h-full">
            @csrf
            <input type="hidden" name="token" value="{{ $token }}">

            <div class="mt-[1rem] w-full">

                <x-form.label name="password" title="{{ __('content.new-password') }}"/>

                <div class="mt-1">
                    <x-flex.row>
                        <x-form.input name="password" type="password" class="password"
                                      placeholder="{{ __('content.enter-new-password') }}"/>
                        <div class="absolute left-[21.5rem] sm:left-[69.5rem] hidden mb-[1.25rem]">
                            <x-svg.approve-svg/>
                        </div>
                    </x-flex.row>
                    <x-form.password-reset-error name="password" class="absolute password-error" position="8"/>
                </div>
            </div>
            <div class="mt-[1rem] w-full">

                <x-form.label name="password_confirmation" title="{{  __('content.repeat-password')  }}"/>

                <div class="mt-1">
                    <x-flex.row>
                        <x-form.input name="password_confirmation" type="password"
                                      placeholder="{{ __('content.repeat-password') }}"/>
                        <div class="absolute left-[21.5rem] sm:left-[69.5rem] hidden mb-[1.25rem]">
                            <x-svg.approve-svg/>
                        </div>
                    </x-flex.row>
                    <x-form.password-reset-error name="password_confirmation" class="absolute" position="8"/>
                </div>
            </div>
            <x-flex.row class="justify-between w-full mt-[22rem] sm:mt-[1rem]">
                <x-form.button title="{{ __('content.save-changes') }}"/>
            </x-flex.row>
        </form>
    </x-flex.col>
</x-feedback-layout>
