<footer class="mt-auto bg-black">

    <div class="mx-auto max-w-screen-xl px-4 py-12 text-white">
        <div class="grid grid-cols-[50%_1fr_1fr] gap-4">
            <div class="">
                <h1 class="text-4xl font-extrabold">
                    <a href="">LO<span class="text-primary">GO</span></a>
                </h1>
                <p class="my-4 text-gray-400">
                    © logo. Todos los derechos reservados 2022.
                </p>

                <div class="flex">

                    <a href="" class="mr-2">
                        <span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-brand-instagram"
                                width="26" height="26" viewBox="0 0 24 24" stroke-width="1.5" stroke="#2c3e50"
                                fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <rect x="4" y="4" width="16" height="16" rx="4" />
                                <circle cx="12" cy="12" r="3" />
                                <line x1="16.5" y1="7.5" x2="16.5" y2="7.501" />
                            </svg>
                        </span>
                    </a>

                    <a href="">
                        <span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-brand-facebook"
                                width="26" height="26" viewBox="0 0 24 24" stroke-width="1.5" stroke="#2c3e50"
                                fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M7 10v4h3v7h4v-7h3l1 -4h-4v-2a1 1 0 0 1 1 -1h3v-4h-3a5 5 0 0 0 -5 5v2h-3" />
                            </svg>
                        </span>
                    </a>

                </div>

            </div>
            <div>
                <h3 class="mb-2 font-bold">Shortcuts</h3>
                <ul>
                    <li class="mb-2">
                        <a class="hover:text-primary text-gray-400 transition-colors duration-200"
                            href="{{ route('home') }}">Inicio</a>
                    </li>
                    <li class="mb-2">
                        <a class="hover:text-primary text-gray-400 transition-colors duration-200"
                            href="{{ route('products.category', 'hombre') }}">Hombre</a>
                    </li>
                    <li class="mb-2">
                        <a class="hover:text-primary text-gray-400 transition-colors duration-200"
                            href="{{ route('products.category', 'mujer') }}">Mujer</a>
                    </li>
                    <li class="">
                        <a class="hover:text-primary text-gray-400 transition-colors duration-200"
                            href="#">Nosotros</a>
                    </li>

                </ul>
            </div>
            <div>
                <h3 class="mb-2 font-bold">Información</h3>
                <ul>
                    <li class="mb-2"><a class="hover:text-primary text-gray-400 transition-colors duration-200"
                            href="">Blogs</a></li>
                    <li class="mb-2"><a class="hover:text-primary text-gray-400 transition-colors duration-200"
                            href="">FAQs</a></li>
                </ul>
            </div>
        </div>
    </div>

</footer>
