@props(['title', 'message'])

<div {{ $attributes(['class' => 'flex flex-col ml-[9.25rem] justify-start items-start w-[24.5rem] min-h-[28.188rem] mt-[3.75rem]']) }}>
    <p class="text-[25px] font-black text-dark-100">{{ $title }}</p>
    <p class="text-[20px] font-normal text-dark-60 mt-4">{{ $message }}</p>
    {{ $slot }}
</div>