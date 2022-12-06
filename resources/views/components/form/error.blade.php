@props(['name'])

@error($name)
<div class="flex justify-start items-center">
    <x-svg.error-svg/>
    <p {{ $attributes->merge(['class' => 'text-error font-normal  absolute left-44 text-[14px]']) }}>{{ $message }}</p>
</div>
@enderror
