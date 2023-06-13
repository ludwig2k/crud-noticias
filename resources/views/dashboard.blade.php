<x-app-layout>
    @if(session('noticiaSalva'))
    <script>
    Swal.fire({
        icon: 'success',
        title: 'Sua noticia foi criada com sucesso!',
        showConfirmButton: false,
        timer: 5000
    })
    </script>
    @endif
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        
    </div>
</x-app-layout>
