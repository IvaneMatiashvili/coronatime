<x-feedback-layout>
    <x-flex.col>
        <p class="font-black text-[1.563rem] text-dark-100">Reset Password</p>
    <form method="POST" action="{{ route('forget.password.get') }}" enctype="multipart/form-data" class="w-full h-full">
        @csrf

        <div class="w-full mt-[5.188rem]">

            <x-form.label name="email" title="Email"/>

            <div class="mt-1">
                <x-form.input name="email" class="h-12" type="email" placeholder="Enter your email"/>
                <x-form.error name="email" class="mt-2"/>
            </div>
        </div>
        <x-flex.row class="justify-between w-full mt-[2rem]">
            <x-form.button title="RESET PASSWORD"/>
        </x-flex.row>
    </form>
    </x-flex.col>
</x-feedback-layout>
