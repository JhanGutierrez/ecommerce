@props(['title' => 'Title', 'disabled' => false])

<button
    {{ $attributes->merge(['class' => 'flex h-[50px] transform select-none items-center justify-center bg-black px-3 text-white transition-all duration-300  disabled:cursor-pointer hover:text-primary', 'type' => 'button']) }}>
    {{ $title }}
</button>
