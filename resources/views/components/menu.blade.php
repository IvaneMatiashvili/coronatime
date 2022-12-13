<div class="menu z-50 w-screen h-screen absolute hidden flex-col justify-center items-center bg-gradient-to-r from-purple-500 to-pink-500">
    <P class="go-back flex items-center justify-center w-[10rem] h-[3rem] rounded-3xl mb-8 font-medium text-dark-100 bg-gray-400 text-[0.875rem] cursor-pointer">
        {{ __('content.go-back') }}
    </P>
    <form method="get" action="{{ route('logout') }}" class="block sm:hidden">
        @csrf
        <button type="submit" class="hover:overline w-[10rem] h-[3rem] rounded-3xl font-medium text-dark-100 bg-amber-200 text-[0.875rem] cursor-pointer">
            {{ __('content.logout') }}
        </button>
    </form>
</div>