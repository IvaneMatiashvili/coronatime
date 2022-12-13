<x-email-layout>
    <img src="{{ $message->embed(public_path().'/images/landing.png') }}" alt="landing image" style="display: block;
        margin-top: 5rem;
        margin-left: auto;
        margin-right: auto;
        width: 40%;
        "
    />
    <div class="content-container">
        <p class="confirmation" style="font-weight: 900;
        font-size: 25px;
        text-align: center;
        margin-top: 3.5rem;
        color: #010414;
        font-family: 'Inter', 'sans-serif';">
            {{ __('content.confirmation-email') }}
        </p>
        <p class="info" style=" font-weight: 400;
        font-size: 18px;
        text-align: center;
        margin-top: 1rem;
        color: #010414;
        width: 100%;
        font-family: 'Inter', 'sans-serif';">{{ __('content.click-btn-verify') }}</p>
        <a href="{{ route('user.verify', $user->verifyUser->token)  }}" style=" font-weight: 900;
        font-size: 1rem;
        color: #FFFFFF;
        background: #0FBA68;
        display: block;
        margin: auto;
        text-align: center;
        width: 25%;
        border: 1rem solid #0FBA68;
        height: 1.5rem;
        border-radius: 8px;
        text-decoration: none;
        font-family: 'Inter', 'sans-serif';">
            {{ __('content.email-verification') }}
        </a>
    </div>

    <style>
        @font-face {
            font-family: 'Inter';
            font-style: normal;
            src:  url({{ public_path().'/fonts/Inter-VariableFont_slnt,wght.ttf' }}) format("truetype");
        }
        @media (max-width: 600px) {
            a {
                width: 16rem !important;
            }
            img {
                margin-top: 0 !important;
                height: 20rem !important;
                width: 19rem !important;
            }
        }
    </style>
</x-email-layout>