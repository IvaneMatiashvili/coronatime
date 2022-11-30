<x-email-layout>
    <img src="{{ $message->embed(public_path().'/images/landing.png') }}" alt="landing image"/>
    <div class="content-container">
        <p class="confirmation">Confirmation email</p>
        <p class="info">click this button to verify your email</p>
        <a href="{{ route('user.verify', $user->verifyUser->token)  }}">
            VERIFY EMAIL
        </a>
    </div>
</x-email-layout>