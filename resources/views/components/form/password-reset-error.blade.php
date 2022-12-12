@props(['name', 'position', 'smPosition'])

@error($name)
<div  {{ $attributes->merge(['class' => 'flex justify-start items-center']) }}>
    <x-svg.error-svg class="absolute"/>
    <p class = "text-error font-normal w-[20rem] absolute font-inter left-8 text-[14px]" >{{ $message }}</p>
</div>
@enderror
