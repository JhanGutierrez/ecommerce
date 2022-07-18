<div class="fixed top-0 z-[40] w-full bg-black">

    <!-- Whole navbar container -->
    <header class="m-auto flex h-full max-w-screen-xl items-center px-4">

        <!-- This contains the navbar main content -->
        <nav class="flex h-[70px] w-full items-center justify-between">

            <!-- Displays the a navbar icon in the mobile version -->
            <span class="cursor-pointer lg:hidden">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-menu-2" width="30"
                    height="30" viewBox="0 0 24 24" stroke-width="2" stroke="#1F1F1F" fill="none"
                    stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <line x1="4" y1="6" x2="20" y2="6" />
                    <line x1="4" y1="12" x2="20" y2="12" />
                    <line x1="4" y1="18" x2="20" y2="18" />
                </svg>
            </span>

            <a href="" class="block text-2xl font-extrabold text-white">LO<span
                    class="text-primary">GO</span></a>

            <ul class="flex items-center">
                <x-guest.nav-item title="Inicio" uri="{{ route('home') }}" activeRoute="{{ request()->is('/') }}" />

                @foreach ($categories as $category)
                    @if (count($category->subcategories) > 0)
                        <x-guest.nav-dropdown title='{{ $category->name }}'
                            uri="{{ route('products.category', $category) }}"
                            activeRoute="{{ str_contains(url()->current(), '/products/' . strtolower($category->name)) }}">
                            <x-slot name="submenu">
                                @foreach ($category->subcategories as $subcategory)
                                    <li>
                                        <a href={{ route('products.category.subcategory', [$category, $subcategory->id]) }}
                                            class="hover:text-primary block w-fit cursor-pointer p-1 transition-colors duration-200">{{ $subcategory->name }}
                                        </a>
                                    </li>
                                @endforeach
                            </x-slot>

                        </x-guest.nav-dropdown>
                    @endif
                @endforeach
            </ul>

            <ul class="flex items-center">
                <li>
                    <span class="group mr-4 block cursor-pointer">
                        <svg xmlns="http://www.w3.org/2000/svg"
                            class="icon icon-tabler icon-tabler-search group-hover:stroke-primary transition-colors duration-200"
                            width="26" height="26" viewBox="0 0 24 24" stroke-width="2" stroke="#fff"
                            fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <circle cx="10" cy="10" r="7" />
                            <line x1="21" y1="21" x2="15" y2="15" />
                        </svg>
                    </span>
                </li>

                <li>
                    <div class="relative block cursor-pointer" @click="showCart=true" id="open-cart">
                        @if (\Cart::getTotalQuantity())
                            <span
                                class="bg-primary absolute top-0 right-0 inline-flex translate-x-1/2 -translate-y-1/2 transform items-center justify-center rounded-full px-2 py-1 text-xs font-bold leading-none text-black">{{ \Cart::getTotalQuantity() }}</span>
                        @else
                            <span
                                class="bg-primary absolute top-0 right-0 block h-2 w-2 -translate-y-1/2 transform rounded-full"></span>
                        @endif

                        <span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-shopping-cart"
                                width="26" height="26" viewBox="0 0 24 24" stroke-width="1.8" stroke="#fff"
                                fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <circle cx="6" cy="19" r="2" />
                                <circle cx="17" cy="19" r="2" />
                                <path d="M17 17h-11v-14h-2" />
                                <path d="M6 5l14 1l-1 7h-13" />
                            </svg>
                        </span>

                    </div>
                </li>
            </ul>

        </nav>

    </header>
</div>


@push('scripts')
    <script>
        const openCart = document.querySelector('#open-cart');
        const closeCart = document.querySelector('#close-cart');

        openCart.addEventListener('click', () => {
            document.body.classList.add('overflow-hidden');
        });

        closeCart.addEventListener('click', () => {
            document.body.classList.remove('overflow-hidden');
        });
    </script>
@endpush
