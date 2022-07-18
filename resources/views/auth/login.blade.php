@extends('layouts.auth_layout')

@section('content')
    <section class="min-h-screen w-full bg-gray-100 px-4 py-4 lg:py-12">

        <div
            class="m-auto grid h-[calc(100vh-2rem)] min-h-[700px] max-w-screen-xl grid-cols-1 items-center overflow-hidden rounded-lg bg-white drop-shadow-md lg:h-[calc(100vh-6rem)] lg:grid-cols-2">

            <form action="{{ route('login') }}" method="POST" class="p-10">
                @csrf
                <h1 class="text-center">Logo</h1>
                <h2 class="mb-2 text-center text-5xl font-bold">Iniciar sesión</h2>
                <span class="text-primary block text-center font-medium">Bienvenido de vuelta!</span>
                <x-form.text-input type="email">
                    <x-slot name='title'>
                        Correo
                    </x-slot>

                    <x-slot name='placeholder'>
                        Ingrese su correo
                    </x-slot>

                    <x-slot name='name'>
                        email
                    </x-slot>
                </x-form.text-input>

                <x-form.text-input type="password">
                    <x-slot name='title'>
                        Contraseña
                    </x-slot>

                    <x-slot name='placeholder'>
                        Ingrese su contraseña
                    </x-slot>

                    <x-slot name='name'>
                        password
                    </x-slot>
                </x-form.text-input>

                <input type="submit" value="Ingresar"
                    class="mt-2 w-full cursor-pointer rounded-md bg-slate-900 p-3 text-gray-50">

            </form>

            <div class="hidden overflow-hidden lg:block lg:h-full">
                <img src="https://images.unsplash.com/photo-1499971644409-aeed9e7b7404?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=687&q=80"
                    alt="" class="h-full w-full object-cover">
            </div>

        </div>


    </section>
@endsection
