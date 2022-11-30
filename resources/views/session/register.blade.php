<x-session-layout>
    <x-panel title="Welcome to Coronatime" message="Please enter required info to sign up">
        <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data" class="w-full h-full">
            @csrf

            <div class="w-full mt-[1.5rem]">

                <x-form.label name="name" title="Username"/>

                <div class="mt-1">
                    <x-form.input name="name" type="text" placeholder="Enter unique username"/>
                    <x-form.error name="name" class="mt-2"/>
                </div>
            </div>
            <div class="mt-[2rem] w-full">

                <x-form.label name="email" title="Email"/>

                <div class="mt-1">
                    <x-form.input name="email" class="h-12" type="email" placeholder="Enter your email"/>
                    <x-form.error name="email" class="mt-2"/>
                </div>
            </div>
            <div class="mt-[2rem] w-full">

                <x-form.label name="password" title="Password"/>

                <div class="mt-1">
                    <x-form.input name="password" type="password" class="h-12" placeholder="Fill in password"/>
                    <x-form.error name="password" class="mt-2"/>
                </div>
            </div>
            <div class="mt-[2rem] w-full">

                <x-form.label name="password_confirmation" title="Repeat password"/>

                <div class="mt-1">
                    <x-form.input name="password_confirmation" type="password" class="h-12" placeholder="Repeat password"/>
                    <x-form.error name="password_confirmation" class="mt-2"/>
                </div>
            </div>

            <div class="flex items-center mt-[1.563rem]">
                <label class="flex items-center">
                    <input
                            type="checkbox"
                            class="bg-white border-dark-20 rounded-sm outline-none w-[1.25rem] h-[1.25rem] text-green-box cursor-pointer focus:ring-0"
                    />
                     <span class="ml-[0.5rem] text-dark-100 font-semibold font-[0.875rem] cursor-pointer">Remember this device</span>
                </label>
            </div>

            <x-flex.row class="justify-between w-full">
                <x-form.button title="SIGN UP"/>
            </x-flex.row>
            <x-flex.row class="w-full mt-[1.5rem]">
                <p class="text-dark-60 text-base font-normal">
                    Already have an account?
                    <a href="{{ route('login') }}" class="text-base text-dark-100 font-bold">
                        Log in
                    </a>
                </p>
            </x-flex.row>
        </form>
    </x-panel>
</x-session-layout>