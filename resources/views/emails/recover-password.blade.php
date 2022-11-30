<x-email-layout>
    <img src="{{ $message->embed(public_path().'/images/landing.png') }}" alt="landing image"/>
    <div class="content-container">
        <p class="confirmation">Recover password</p>
        <p class="info">click this button to recover a password</p>
        <a href="{{ route('reset.password.get', $token) }}">
            RECOVER PASSWORD
        </a>
    </div>
</x-email-layout>
