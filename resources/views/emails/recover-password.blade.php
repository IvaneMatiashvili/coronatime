
<x-email-layout fontUrl="{{ $message->embed(public_path().'/images/landing.png') }}">
    <img src="{{ $message->embed(public_path().'/images/landing.png') }}" alt="landing image"/>
    <div class="content-container">
        <p class="confirmation">{{ __('content.recover-password') }}</p>
        <p class="info">{{ __('content.click-btn-recover') }}</p>
        <a href="{{ route('reset.password.get', $user->token) }}">
           {{ __('content.recover-password') }}
        </a>
    </div>
</x-email-layout>
