@props(['name'])

@if($errors->has($name))

    <input name="{{ $name }}" id="{{ $name }}"
            {{ $attributes->merge(['class' => 'placeholder-dark-60 placeholder-4 placeholder-dark text-dark-100 font-inter h-[3.5rem] mb-[1.25rem]  outline-none shadow-none pl-[24px] w-[23.5rem] sm:w-[24.5rem] border border-error rounded-lg focus:border-blue-border']) }}
            {{ $attributes(['value' => old($name)]) }}
    >

@else
    <input name="{{ $name }}" id="{{ $name }}"
            {{ $attributes->merge(['class' => 'placeholder-dark-60 placeholder-4 placeholder-dark font-inter text-dark-100 h-[3.5rem] mb-[1.25rem] focus:outline-none shadow-none w-[23rem] sm:w-[24.5rem]  pl-[24px] border border-dark-20 rounded-lg focus:border-blue-border']) }}
            {{ $attributes(['value' => old($name)]) }}
    >
@endif
