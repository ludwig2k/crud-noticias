<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Criar uma notícia') }}
        </h2>
    </x-slot>

    <div class="flex  justify-center min-h-screen py-10">
        <div class="w-full sm:max-w-md">
            <div class="py-12">
                <form method="POST" action="{{route('noticia.update')}}" enctype="multipart/form-data"> 
                    @csrf
                    @method('PUT')
                    <input type="hidden" id="noticiaId" name="noticiaId" value="{{$noticia->id}}">
                    <div>
                        <x-input-label for="titulo" :value="__('Titulo')" />
                        <x-text-input id="titulo" class="block mt-1 w-full" type="text" name="titulo" :value="$noticia->titulo" required/>
                        <x-input-error :messages="$errors->get('titulo')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="descricao" :value="__('Descrição')" />
                        <x-text-input id="descricao" class="block mt-1 w-full" type="text" name="descricao" :value="$noticia->descricao" required/>
                        <x-input-error :messages="$errors->get('descricao')" class="mt-2" />
                    </div>

                    <div>
                        <x-input-label for="tag" :value="__('Tag')" />
                        <select id="tag" class="block mt-1 w-full" name="tag" required>
                            <option value="{{$noticia->tag}}">{{$noticia->tag}}</option>
                            <option value="futebol">Futebol</option>
                            <option value="música">Música</option>
                            <option value="tecnologia">Tecnologia</option>
                            <option value="política">Política</option>
                            <option value="jogos">Jogos</option>
                        </select>
                        <x-input-error :messages="$errors->get('tag')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="imagem" :value="__('Imagem')" />
                        <input id="imagem" class="block mt-1 w-full" type="file" name="imagem" />
                        <p class="text-gray-500 text-sm mt-1">Caso nenhum arquivo seja selecionado, a foto continuará a mesma.</p>
                        <x-input-error :messages="$errors->get('imagem')" class="mt-2" />
                    </div>
                    

                    <div class="flex items-center justify-end mt-4">


                        <x-primary-button class="ml-4">
                            {{ __('Enviar') }}
                        </x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
