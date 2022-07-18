@props(['title' => 'Item', 'uri' => '#', 'lastChild' => false, 'activeRoute' => false])

<li class="group relative mr-4">
    <a href="{{ $uri }}"
        class="group-hover:text-primary {{ $activeRoute ? 'text-primary' : 'text-white' }} block py-[calc((70px-24px)/2)] transition-colors duration-200">{{ $title }}
    </a>

</li>
