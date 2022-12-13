<x-session-layout>
    <x-panel title="{{ __('content.welcome-back') }}" message="{{ __('content.please-enter-your-details') }}">
        <form method="POST" action="{{ route('login') }}" enctype="multipart/form-data" class="w-full h-full">
            @csrf

            <div class="w-full mt-[1.5rem]">

                <x-form.label name="name" title="{{ __('content.username') }}"/>

                <div class="mt-1">
                    <x-flex.row>
                        <x-form.input name="name" type="text"
                                      placeholder="{{ __('content.enter-username-or-email') }}"/>
                        <div class="absolute left-[21.5rem] sm:left-[31rem] hidden mb-[1.25rem]">
                            <x-svg.approve-svg/>
                        </div>
                    </x-flex.row>
                    <x-form.error name="name" class="name-error" position="44"/>
                </div>
            </div>
            <div class="mt-[1rem] w-full">

                <x-form.label name="password" title="{{ __('content.password') }}"/>

                <div class="mt-1">
                    <x-flex.row>
                        <x-form.input name="password" type="password" class="login-password"
                                      placeholder="{{ __('content.enter-password') }}"/>
                        <div class="absolute left-[21.5rem] sm:left-[31rem] hidden mb-[1.25rem]">
                            <x-svg.approve-svg/>
                        </div>
                    </x-flex.row>
                    <x-form.error name="password" class="password-error"  position="44"/>
                </div>
            </div>
            <div class="flex items-center mt-[1rem] w-full">
                <label class="flex items-center w-full">
                    <input
                            type="checkbox"
                            class="bg-white border-dark-20 rounded-sm outline-none w-[1.25rem] h-[1.25rem] text-green-box cursor-pointer focus:ring-0"
                            name="remember-me"
                    />
                    <span class="flex justify-between w-full">
                        <span class="text-dark-100 ml-[0.5rem] w-[12rem] font-inter font-semibold font-[0.875rem] cursor-pointer">{{ __('content.remember-this-device') }}</span>
                        <a class="text-blue-border font-inter font-semibold font-[0.875rem] cursor-pointer"
                           href="{{ route('forget.password.get') }}">{{ __('content.forgot-password') }}</a>
                    </span>
                </label>
            </div>

            <x-flex.row class="justify-between w-full">
                <x-form.button title="{{ __('content.login') }}"/>
            </x-flex.row>
            <x-flex.row class="w-full mt-[1.5rem]">
                <p class="text-dark-60 font-inter text-base font-normal">
                    {{ __('content.do-not-have-account') }}
                    <a href="{{ route('register') }}" class="text-base font-inter text-dark-100 font-bold">
                        {{ __('content.register-for-free') }}
                    </a>
                </p>
            </x-flex.row>
        </form>
        @if (session()->has('info'))
            <x-flex.row class="w-full mt-4">
                <p class="text-sky-800 font-inter text-xl font-bold">
                    {{ session('info') }}
                </p>
            </x-flex.row>
        @endif
    </x-panel>
</x-session-layout>