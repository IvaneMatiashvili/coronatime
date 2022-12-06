<x-session-layout>
    <x-panel title="{{ __('content.welcome-to-coronatime') }}" message="{{ __('content.please-enter-registration-info') }}">
        <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data" class="w-full h-full">
            @csrf

            <div class="w-full mt-[1.5rem]">

                <x-form.label name="name" title="{{ __('content.username') }}"/>

                <div class="mt-1">
                    <x-form.input name="name" type="text" placeholder="{{ __('content.enter-username') }}"/>
                    <x-form.error name="name"/>
                </div>
            </div>
            <div class="mt-[1rem] w-full">

                <x-form.label name="email" title="{{ __('content.email') }}"/>

                <div class="mt-1">
                    <x-form.input name="email" type="email" placeholder="{{ __('content.enter-email') }}"/>
                    <x-form.error name="email"/>
                </div>
            </div>
            <div class="mt-[1rem] w-full">

                <x-form.label name="password" title="{{ __('content.password') }}"/>

                <div class="mt-1">
                    <x-form.input name="password" type="password" placeholder="{{ __('content.enter-password') }}"/>
                    <x-form.error name="password"/>
                </div>
            </div>
            <div class="mt-[1rem] w-full">

                <x-form.label name="password_confirmation" title="{{ __('content.repeat-password') }}"/>

                <div class="mt-1">
                    <x-form.input name="password_confirmation" type="password" placeholder="{{ __('content.repeat-password') }}"/>
                    <x-form.error name="password_confirmation"/>
                </div>
            </div>

            <x-flex.row class="justify-between w-full">
                <x-form.button title="{{ __('content.sign-up') }}"/>
            </x-flex.row>
            <x-flex.row class="w-full mt-[1.5rem]">
                <p class="text-dark-60 text-base font-normal">
                    {{ __('content.have-account') }}
                    <a href="{{ route('login') }}" class="text-base text-dark-100 font-bold">
                        {{ __('content.login') }}
                    </a>
                </p>
            </x-flex.row>
        </form>
    </x-panel>
</x-session-layout>