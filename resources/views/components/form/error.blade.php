@props(['name'])

@error($name)
    <p {{ $attributes->merge(['class' => 'text-red-400 italic absolute text-xs']) }}>{{ $message }}</p>
@enderror
