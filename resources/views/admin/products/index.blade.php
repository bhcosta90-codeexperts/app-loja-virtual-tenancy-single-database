<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Produtos') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="flex justify-end mb-8">
                <a href="{{route('admin.products.create')}}" class="px-6 py-2 font-bold text-white bg-green-600 rounded shadow">Criar Produto</a>
            </div>
            <div class="flex flex-col">
                <div class="inline-block min-w-full py-2 align-middle">
                    <div class="overflow-hidden border-b border-gray-200 shadow sm:rounded-lg">
                        <table class="w-full divide-y divide-gray-200">
                            <thead class="bg-gray-100">
                            <tr>
                                <th scope="col" class="px-6 py-4 text-xs tracking-wider text-center text-gray-500 uppercase font-semi">
                                    #
                                </th>
                                <th scope="col" class="px-6 py-4 text-xs tracking-wider text-center text-gray-500 uppercase font-semi">
                                    Name
                                </th>
                                <th scope="col" class="px-6 py-4 text-xs tracking-wider text-center text-gray-500 uppercase font-semi">
                                    Preço
                                </th>
                                <th scope="col" class="px-6 py-4 text-xs tracking-wider text-center text-gray-500 uppercase font-semi">
                                    Criado Em
                                </th>
                                <th scope="col" class="w-48 px-6 py-4 text-xs tracking-wider text-center text-gray-500 uppercase font-semi">
                                    Ações
                                </th>
                            </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                            @forelse($products as $product)
                                <tr>
                                    <td class="px-6 py-4 text-sm text-center text-gray-500 whitespace-nowrap">
                                        {{$product->id}}
                                    </td>
                                    <td class="px-6 py-4 text-sm text-center text-gray-500 whitespace-nowrap">
                                        {{$product->name}}
                                    </td>
                                    <td class="px-6 py-4 text-sm text-center text-gray-500 whitespace-nowrap">
                                        R$ {{number_format($product->price, 2, ',', '.')}}
                                    </td>
                                    <td class="px-6 py-4 text-sm text-center text-gray-500 whitespace-nowrap">
                                        {{$product->created_at->format('d/m/Y H:i:s')}}
                                    </td>
                                    <td class="flex justify-between w-48 px-6 py-4 text-sm text-center text-gray-500 whitespace-nowrap">
                                        <a href="{{route('admin.products.edit', $product)}}" class="font-bold text-blue-500 transition-all duration-200 ease-in-out hover:text-blue-200 hover:underline">EDITAR</a>


                                        <form action="{{route('admin.products.destroy', $product)}}" class="destroyButton" method="POST">
                                            @csrf
                                            @method("DELETE")
                                            <button
                                                class="font-bold text-red-500 transition-all duration-200 ease-in-out hover:text-red-200 hover:underline"
                                            >REMOVER</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="px-6 py-4 text-sm text-center text-gray-500 whitespace-nowrap"><h3>Nenhum produto encontrado em sua loja</h3></td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                    <div class="mt-8">
                        {{$products->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>