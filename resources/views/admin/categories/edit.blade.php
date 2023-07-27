<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Editar Categoria') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="flex flex-col">
                <div class="-my-2 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <form action="{{route('admin.categories.update', $category)}}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="w-full mb-8">
                            <label>Nome</label>
                            <input type="text" name="name" class="w-full rounded focus:border-gray-400 focus:ring-0" value="{{$category->name}}">
                        </div>

                        <div class="w-full mb-8">
                            <label>Descrição</label>
                            <input type="text" name="description" class="w-full rounded focus:border-gray-400 focus:ring-0" value="{{$category->description}}">
                        </div>

                        <button class="px-4 py-2 text-xl font-bold text-white transition-all duration-200 ease-in-out bg-green-600 border border-green-900 rounded hover:bg-green-300 hover:text-green-900">
                            Atualizar
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>