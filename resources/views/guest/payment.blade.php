<x-layouts.guest-basic-layout>
    <section class="bg-gray-100">
        <div class="mx-auto w-full max-w-[700px] pb-12">

            <x-guest.section-title title="Resumen de orden" subtitle="Confirmar detalles de compra" />

            <div class="border border-gray-200 bg-white p-4">

                <div class="mb-6">
                    <!--TODO: Table scroll-->
                    @if (\Cart::getContent()->count() > 0)
                        <table class="w-full">
                            @foreach ($content as $item)
                                <tr class="group border-b border-gray-200 first:pt-0 last:border-b-0">
                                    <th class="pt-3 pb-3 text-center text-gray-400 group-first:pt-0 group-last:pb-0">
                                        <img src="{{ $item->attributes->img }}" alt="{{ $item->name }}"
                                            class="h-auto w-20 object-cover">
                                    </th>
                                    <td class="pt-3 pb-3 pl-2 text-left group-first:pt-0 group-last:pb-0">
                                        <h3>{{ $item->name }}</h3>
                                        <p class="text-sm text-gray-400">
                                            <span>
                                                {{ $item->attributes->color_id != null ? App\Models\Color::where('id', $item->attributes->color_id)->first()->name : '' }}
                                            </span>
                                            <span>
                                                {{ $item->attributes->size_id != null ? App\Models\Size::where('id', $item->attributes->size_id)->first()->name : '' }}
                                            </span>
                                        </p>
                                    </td>
                                    <td class="pt-3 pb-3 pl-2 text-right group-first:pt-0 group-last:pb-0">
                                        <p>
                                            <span>{{ $item->price }}</span>
                                            <span
                                                class="block text-sm text-gray-400">{{ 'x ' . $item->quantity }}</span>
                                        </p>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    @endif
                </div>

                <div class="info">
                    <table class="w-full">
                        <tr>
                            <th class="py-2 text-left font-normal text-gray-400"># de orden:</th>
                            <td class="py-2 text-right">{{ $order->id }}</td>
                        </tr>

                        <tr>
                            <th class="py-2 text-left font-normal text-gray-400">Nombre:</th>
                            <td class="py-2 text-right">{{ $order->name }} {{ $order->last_name }}</td>
                        </tr>

                        <tr>
                            <th class="py-2 text-left font-normal text-gray-400">Correo:</th>
                            <td class="py-2 text-right">{{ $order->email }} </td>
                        </tr>

                        <tr>
                            <th class="py-2 text-left font-normal text-gray-400">Dirección:</th>
                            <td class="py-2 text-right">
                                <span class="block">{{ $order->address }}</span>
                                <span class="text-sm text-gray-400">{{ $order->department->name }} -
                                    {{ $order->city->name }}
                                    -
                                    {{ $order->district->name }} </span>
                            </td>
                        </tr>
                        <tr>
                            <th class="py-2 text-left font-normal text-gray-400">Subtotal:</th>
                            <td class="py-2 text-right">COP {{ $order->total - $order->shipping_cost }} </td>
                        </tr>
                        <tr>
                            <th class="py-2 text-left font-normal text-gray-400">Envio:</th>
                            <td class="py-2 text-right">COP {{ $order->shipping_cost }} </td>
                        </tr>
                        <tr class="bg-gray-100">
                            <th class="py-2 pl-2 text-left">Total:</th>
                            <td class="py-2 pr-2 text-right font-bold">COP {{ $order->total }} </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </section>
</x-layouts.guest-basic-layout>
