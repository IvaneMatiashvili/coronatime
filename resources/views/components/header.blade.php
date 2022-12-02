@props(['username'])
<header class="bg-yellow w-full h-[5rem] flex justify-between items-center">
    <x-svg.coronatime class="ml-[9.25rem]"/>
    <div class="flex justify-between items-center mr-[6.75rem]">
        <p class="mr-4 font-bold text-[1rem]">
            {{ $username }}
        </p>
        <span class="border border-dark-20 h-[2rem] mr-4"></span>
        <form method="post" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="hover:overline font-medium text-dark-100 text-[0.875rem] cursor-pointer">
                Log Out
            </button>
        </form>
    </div>
</header>
<div class="border border-dark-4 w-full"></div>

