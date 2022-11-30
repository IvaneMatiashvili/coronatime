<x-feedback-layout>
    <x-flex.col>
        <p class="font-black text-[1.563rem] text-dark-100">Reset Password</p>
        <form method="POST" action="{{ route('reset.password.post', $token) }}" enctype="multipart/form-data" class="w-full h-full">
            @csrf
            <input type="hidden" name="token" value="{{ $token }}">

            <div class="mt-[3rem] w-full">

                <x-form.label name="password" title="New password"/>

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
            <x-flex.row class="justify-between w-full mt-[2rem]">
                <x-form.button title="SAVE CHANGES"/>
            </x-flex.row>
        </form>
    </x-flex.col>
</x-feedback-layout>
