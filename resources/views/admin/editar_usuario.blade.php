<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edição de usuário') }}
        </h2>
    </x-slot>

    <div class="flex  justify-center min-h-screen py-10">
        <div class="w-full sm:max-w-md">
            <div class="py-12">
                <form method="POST" action="{{route('admin.updateUser')}}" enctype="multipart/form-data"> 
                    @csrf
                    @method('PUT')
                    <input type="hidden" id="usuarioId" name="usuarioId" value="{{$usuario->id}}">
                    <div>
                        <x-input-label for="nome" :value="__('Nome')" />
                        <x-text-input id="nome" class="block mt-1 w-full" type="text" name="nome" :value="$usuario->name" required/>
                        <x-input-error :messages="$errors->get('titulo')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="email" :value="__('Email')" />
                        <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="$usuario->email" required/>
                        <x-input-error :messages="$errors->get('descricao')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="senha" :value="__('Senha')" />
                        <x-text-input id="senha" class="block mt-1 w-full" type="password" name="senha"/>
                        <x-input-error :messages="$errors->get('senha')" class="mt-2" />
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
