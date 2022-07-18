<x-layouts.guest-layout>

    <section class="mt-[70px] h-[600px] w-full overflow-hidden">

        <div class="swiper home relative h-full">

            <div class="swiper-wrapper">
                <div class="swiper-slide relative">
                    <div class="content absolute top-0 left-0 z-10 flex h-full w-full items-center">
                        <div class="mx-auto w-full max-w-screen-xl px-4">
                            <div class="max-w-[600px]">
                                <h1 class="text-6xl font-bold tracking-wider text-white">Opciones
                                    Para Cualquier Camino </h1>
                                <p class="my-8 text-white">Lorem, ipsum dolor sit amet consectetur adipisicing elit.
                                    Deleniti
                                    dolores excepturi sed doloribus deserunt.</p>
                                <x-button title="Comprar" class="px-12" />
                            </div>
                        </div>
                    </div>
                    <img src="https://images.unsplash.com/photo-1615374744222-9ef163d4fb4c?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=2128&q=80"
                        alt="" class="h-full w-full object-cover">
                </div>
                <div class="swiper-slide relative">
                    <div class="content absolute top-0 left-0 z-10 flex h-full w-full items-center">
                        <div class="mx-auto w-full max-w-screen-xl px-4">
                            <div class="max-w-[600px]">
                                <h1 class="text-6xl font-bold tracking-wider text-white">Opciones
                                    Para Cualquier Camino </h1>
                                <p class="my-8 text-white">Lorem, ipsum dolor sit amet consectetur adipisicing elit.
                                    Deleniti
                                    dolores excepturi sed doloribus deserunt.</p>
                                <x-button title="Comprar" class="px-12" />
                            </div>
                        </div>
                    </div>
                    <img src="https://images.unsplash.com/photo-1592923291913-5d556f1444c5?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1931&q=80"
                        alt="" class="h-full w-full object-cover">
                </div>
                <div class="swiper-slide">
                    <div class="content absolute top-0 left-0 z-10 flex h-full w-full items-center">
                        <div class="mx-auto w-full max-w-screen-xl px-4">
                            <div class="max-w-[600px]">
                                <h1 class="text-6xl font-bold tracking-wider text-white">Opciones
                                    Para Cualquier Camino </h1>
                                <p class="my-8 text-white">Lorem, ipsum dolor sit amet consectetur adipisicing elit.
                                    Deleniti
                                    dolores excepturi sed doloribus deserunt.</p>
                                <x-button title="Comprar" class="px-12" />
                            </div>
                        </div>
                    </div>
                    <img src="https://images.unsplash.com/photo-1631877897776-0e2f51654834?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=2070&q=80"
                        alt="" class="h-full w-full object-cover">
                </div>
            </div>

            <div class="absolute bottom-10 right-20 z-10 flex select-none text-white">

                <div
                    class="prev durarion-300 mr-4 flex items-center p-1 transition-all ease-in hover:translate-x-[-10px]">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-chevron-left"
                        width="30" height="30" viewBox="0 0 24 24" stroke-width="1.8" stroke="#fff"
                        fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <polyline points="15 6 9 12 15 18" />
                    </svg>
                </div>
                <div class="next durarion-300 flex items-center p-1 transition-all ease-in hover:translate-x-[10px]">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-chevron-right"
                        width="30" height="30" viewBox="0 0 24 24" stroke-width="1.8" stroke="#fff"
                        fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <polyline points="9 6 15 12 9 18" />
                    </svg>
                </div>

            </div>
        </div>

    </section>

    <section class="mx-auto max-w-screen-xl px-4">
        <x-guest.section-title>
            <x-slot name="title">
                Productos recientes
            </x-slot>
            <x-slot name="subtitle">
                Tal vez te pueda interesar
            </x-slot>
        </x-guest.section-title>

        <ul class="grid grid-cols-1 gap-x-4 gap-y-12 md:grid-cols-2">
            @foreach ($products as $product)
                <x-guest.grid-product-card uri="{{ route('product.details', $product) }}"
                    img1="{{ Storage::url($product->img_1) }}" img2="{{ Storage::url($product->img_2) }}"
                    productName="{{ $product->name }}" productPrice="{{ $product->price }}" />
            @endforeach
        </ul>
    </section>


    <section class="mt-12">
        <!--TODO: Use tailwind bg-img-->
        <div
            class="flex h-[400px] items-center justify-center overflow-hidden bg-black bg-[url('https://images.unsplash.com/photo-1572372888208-d78cec2f8647?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1931&q=80')] bg-cover bg-fixed bg-center bg-no-repeat">
            <h1 class="text-6xl font-extrabold tracking-wider text-white">HOLA!</h1>
        </div>
    </section>

    @push('scripts')
        <script>
            var swiper = new Swiper(".home", {
                loop: true,
                simulateTouch: false,
                autoplay: {
                    delay: 6000,
                    disableOnInteraction: true,
                },
                navigation: {
                    nextEl: ".next",
                    prevEl: ".prev",
                },
            });
        </script>
    @endpush
</x-layouts.guest-layout>
