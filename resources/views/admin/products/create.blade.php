<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Criar Produto') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="flex flex-col">
                <div class="-my-2 overflow-x-auto">
                    <form action="{{route('admin.products.store')}}" method="POST">
                        @csrf
                        <div class="w-full mb-8">
                            <label>Nome</label>
                            <input type="text" name="name" class="w-full rounded focus:border-gray-400 focus:ring-0">
                        </div>

                        <div class="w-full mb-8">
                            <label>Descrição</label>
                            <input type="text" name="description" class="w-full rounded focus:border-gray-400 focus:ring-0">
                        </div>

                        <div class="w-full mb-8">
                            <label>Descrição</label>
                            <textarea type="text" name="body" class="w-full rounded focus:border-gray-400 focus:ring-0"></textarea>
                        </div>

                        <div class="w-full mb-8">
                            <label>Preço</label>
                            <input type="number" name="price" class="w-full rounded focus:border-gray-400 focus:ring-0">
                        </div>

                        <div class="w-full mb-8">
                                <label class="block mb-8">Categorias</label>
                                <div class="grid grid-cols-3">
                                @forelse($categories as $category)
                                    <div class="flex items-center mb-8">
                                        <label>
                                            <input type="checkbox" name="categories[]" value="{{$category->id}}" class="mr-2 rounded focus:border-gray-400 focus:ring-0"> {{$category->name}}
                                        </label>
                                    </div>
                                @empty
                                    <strong>Sem Categorias Cadastradas em sua Loja</strong>
                                @endforelse
                            </div>
                        </div>

                        <div class="w-full px-6 py-2 mb-8 bg-white border border-gray-400 rounded">
                            <label>Foto</label>
                            <input type="file" name="photo" class="w-full rounded focus:border-gray-400 focus:ring-0">
                        </div>

                        <button class="px-4 py-2 text-xl font-bold text-white transition-all duration-200 ease-in-out bg-green-600 border border-green-900 rounded hover:bg-green-300 hover:text-green-900">
                            Cadastrar
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>