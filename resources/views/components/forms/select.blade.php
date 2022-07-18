@props(['title' => 'Title', 'id' => '', 'containerClass' => '', 'labelClass' => '', 'name' => ''])

<div class="{{ $containerClass }}">
    <label for="{{ $id }}" class="{{ $labelClass }} mb-1 block">{{ $title }}</label>
    <div class="relative">

        <select id="{{ $id }}"
            {{ $attributes->merge(['class' => 'w-full select-none appearance-none transition-all duraiton-200 border border-gray-300 hover:border-black py-3 pr-8 pl-3  focus:border-gray-400 focus:outline-0']) }}>
            {{ $options }}
        </select>

        <span class="pointer-events-none absolute inset-y-0 right-0 mr-3 flex items-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-chevron-down" width="20"
                height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="#1F1F1F" fill="none"
                stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                <polyline points="6 9 12 15 18 9" />
            </svg>
        </span>

    </div>

</div>
