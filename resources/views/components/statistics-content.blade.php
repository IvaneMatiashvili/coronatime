@props(['info'])
<div {{
    $attributes->merge(['class' =>'h-full w-[10rem] flex items-center sm:justify-start justify-start']) }}">
    <p class="text-[0.875rem] font-inter font-normal text-dark-100">
        {{ $info }}
    </p>

</div>
