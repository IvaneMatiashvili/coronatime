<x-feedback-layout>
    <x-flex.col>
        <p class="font-black text-[1.563rem] text-dark-100">{{ __('content.reset-password') }}</p>
        <form method="POST" action="{{ route('reset.password.post', $token) }}" enctype="multipart/form-data" class="w-full h-full">
            @csrf
            <input type="hidden" name="token" value="{{ $token }}">

            <div class="mt-[3rem] w-full">

                <x-form.label name="password" title="{{ __('content.new-password') }}"/>

                <div class="mt-1">
                    <x-form.input name="password" type="password" placeholder="{{ __('content.enter-new-password') }}"/>
                    <x-form.error name="password" class="left-[50rem]"/>
                </div>
            </div>
            <div class="mt-[2rem] w-full">

                <x-form.label name="password_confirmation" title="{{  __('content.repeat-password')  }}"/>

                <div class="mt-1">
                    <x-form.input name="password_confirmation" type="password" placeholder="{{ __('content.repeat-password') }}"/>
                    <x-form.error name="password_confirmation" class="left-[50rem]"/>
                </div>
            </div>
            <x-flex.row class="justify-between w-full mt-[2rem]">
                <x-form.button title="{{ __('content.save-changes') }}"/>
            </x-flex.row>
        </form>
    </x-flex.col>
</x-feedback-layout>
