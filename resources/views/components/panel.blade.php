@props(['title', 'message'])

<div {{ $attributes(['class' => 'flex flex-col lg:ml-[9.25rem] sm:0 justify-start items-start w-[23rem] sm:w-[24.5rem] min-h-[28.188rem] mt-[3.75rem]']) }}>
    <p class="text-[25px] lg:w-[50rem] md:w-32 font-inter  font-black text-dark-100">{{ $title }}</p>
    <p class="text-[20px] lg:w-[50rem] mg:w-32 font-inter  font-normal text-dark-60 mt-4">{{ $message }}</p>
    {{ $slot }}
</div>