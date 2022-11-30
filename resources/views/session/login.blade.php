<x-session-layout>
    <x-panel title="Welcome back" message="Welcome back! Please enter your details">
        <form method="POST" action="{{ route('login') }}" enctype="multipart/form-data" class="w-full h-full">
            @csrf

            <div class="w-full mt-[1.5rem]">

                <x-form.label name="name" title="Username"/>

                <div class="mt-1">
                    <x-form.input name="name" type="text" placeholder="Enter unique username or email"/>
                    <x-form.error name="name" class="mt-2"/>
                </div>
            </div>
            <div class="mt-[2rem] w-full">

                <x-form.label name="password" title="Password"/>

                <div class="mt-1">
                    <x-form.input name="password" type="password" class="h-12" placeholder="Fill in password"/>
                    <x-form.error name="password" class="mt-2"/>
                </div>
            </div>
            <div class="flex items-center mt-[1.563rem] w-full">
                <label class="flex items-center w-full">
                    <input
                            type="checkbox"
                            class="bg-white border-dark-20 rounded-sm outline-none w-[1.25rem] h-[1.25rem] text-green-box cursor-pointer focus:ring-0"
                    />
                    <span class="flex justify-between w-full">
                        <span class="text-dark-100 ml-[0.5rem] font-semibold font-[0.875rem] cursor-pointer">Remember this device</span>
                        <a class="text-blue-border font-semibold font-[0.875rem] cursor-pointer" href="#">Forgot password?</a>
                    </span>
                </label>
            </div>

            <x-flex.row class="justify-between w-full">
                <x-form.button title="LOG IN"/>
            </x-flex.row>
            <x-flex.row class="w-full mt-[1.5rem]">
                <p class="text-dark-60 text-base font-normal">
                    Don’t have and account?
                    <a href="{{ route('register') }}" class="text-base text-dark-100 font-bold">
                        Sign up for free
                    </a>
                </p>
            </x-flex.row>
        </form>
        @if (session()->has('info'))
            <x-flex.row class="w-full mt-4">
                <p class="text-sky-800 text-xl font-bold">
                    {{ session('info') }}
                </p>
            </x-flex.row>
        @endif
    </x-panel>
</x-session-layout>