@props(['title' => 'Item', 'uri' => '', 'activeRoute' => false])

<li class="group relative mr-6 last:mr-0">

    <a href="{{ $uri }}"
        class="group-hover:text-primary {{ $activeRoute ? 'text-primary' : 'text-white' }} flex items-center py-[calc((70px-24px)/2)] transition-colors duration-200">
        {{ $title }}
        <div class="relative ml-2">
            <span
                class="group-hover:bg-primary {{ $activeRoute ? 'bg-primary' : 'bg-white' }} absolute block h-[1px] w-[10px]">
            </span>
            <span
                class="group-hover:bg-primary {{ $activeRoute ? 'bg-primary' : 'bg-white' }} absolute block h-[1px] w-[10px] -rotate-90 transition-all duration-200 group-hover:rotate-0 group-hover:opacity-0">
            </span>
        </div>
    </a>

    <ul class="nav-dropdown-submenu">
        {{ $submenu }}
    </ul>
</li>
