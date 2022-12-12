<x-email-layout fontUrl="{{ $message->embed(public_path().'/images/landing.png') }}">
    <img src="{{ $message->embed(public_path().'/images/landing.png') }}" alt="landing image"/>
    <div class="content-container">
        <p class="confirmation">{{ __('content.confirmation-email') }}</p>
        <p class="info">{{ __('content.click-btn-verify') }}</p>
        <a href="{{ route('user.verify', $user->verifyUser->token)  }}">
            {{ __('content.email-verification') }}
        </a>
    </div>
</x-email-layout>