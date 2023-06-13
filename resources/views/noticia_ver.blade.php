<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Notícia') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <img src="{{ asset('storage/' . $noticia->imagem) }}" alt="Noticia Image" class="mb-2" style="max-width: 400px; max-height: 400px;">
                    <h2 class="text-xl font-bold">{{ $noticia->titulo }}</h2>
                    <p class="text-gray-600">{{ $noticia->descricao }}</p>
                    <h2 class="text-xl font-bold">Tag: {{ $noticia->tag }}</h2>
                    <h2 class="text-xl font-bold">Autor: {{ $noticia->user->name }}</h2>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
