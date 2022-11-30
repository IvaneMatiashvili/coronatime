@props(['name'])

<input name="{{ $name }}" id="{{ $name }}"
       {{ $attributes->merge(['class' => 'placeholder-dark-60 placeholder-4 placeholder-dark text-dark-100 h-[3.5rem] pl-[24px] outline-none w-[24.5rem] border border-dark-20 rounded-lg focus:border-blue-border']) }}
        {{ $attributes(['value' => old($name)]) }}
>
