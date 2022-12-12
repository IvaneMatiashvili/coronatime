<x-session-layout>
    <x-panel title="{{ __('content.welcome-to-coronatime') }}"
             message="{{ __('content.please-enter-registration-info') }}">
        <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data" class="w-full h-full">
            @csrf

            <div class="w-full mt-[1.5rem]">

                <x-form.label name="name" title="{{ __('content.username') }}"/>
                <div class="mt-1">
                    <x-flex.row>
                        <x-form.input name="name" type="text" placeholder="{{ __('content.enter-username') }}"/>
                        <div class="absolute left-[21.5rem] sm:left-[31rem] hidden mb-[1.25rem]">
                            <x-svg.approve-svg/>
                        </div>
                    </x-flex.row>
                    <x-form.error name="name" class="name-error" position="10" smPosition="20"/>
                </div>
            </div>
            <div class="mt-[1rem] w-full">

                <x-form.label name="email" title="{{ __('content.email') }}"/>

                <div class="mt-1">
                    <x-flex.row>
                        <x-form.input name="email" type="text" placeholder="{{ __('content.enter-email') }}"/>
                        <div class="absolute left-[21.5rem] sm:left-[31rem] hidden mb-[1.25rem]">
                            <x-svg.approve-svg/>
                        </div>
                    </x-flex.row>
                    <x-form.error name="email" class="email-error" position="10" smPosition="44"/>
                </div>
            </div>
            <div class="mt-[1rem] w-full">

                <x-form.label name="password" title="{{ __('content.password') }}"/>

                <div class="mt-1">
                    <x-flex.row>
                        <x-form.input name="password" type="password" class="password"
                                      placeholder="{{ __('content.enter-password') }}"/>
                        <div class="absolute left-[21.5rem] sm:left-[31rem] hidden mb-[1.25rem]">
                            <x-svg.approve-svg/>
                        </div>
                    </x-flex.row>
                    <x-form.error name="password" class="password-error"  position="10" smPosition="44"/>
                </div>
            </div>
            <div class="mt-[1rem] w-full">

                <x-form.label name="password_confirmation" title="{{ __('content.repeat-password') }}"/>

                <div class="mt-1">

                    <x-flex.row>
                        <x-form.input name="password_confirmation" type="password"
                                      placeholder="{{ __('content.repeat-password') }}"/>
                        <div class="absolute left-[21.5rem] sm:left-[31rem] hidden mb-[1.25rem]">
                            <x-svg.approve-svg/>
                        </div>
                    </x-flex.row>
                    <x-form.error name="password_confirmation"  position="10" smPosition="44"/>
                </div>
            </div>

            <x-flex.row class="justify-between w-full">
                <x-form.button title="{{ __('content.sign-up') }}"/>
            </x-flex.row>
            <x-flex.row class="w-full mt-[1.5rem]">
                <p class="text-dark-60 font-inter text-base font-normal">
                    {{ __('content.have-account') }}
                    <a href="{{ route('login') }}" class="text-base font-inter text-dark-100 font-bold">
                        {{ __('content.login') }}
                    </a>
                </p>
            </x-flex.row>
        </form>
    </x-panel>
</x-session-layout>