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
        <div class="mt-4">
            <form action="{{ route('home') }}" method="GET">
                <label for="itemsPerPage">Itens por página:</label>
                <select id="itemsPerPage" name="itemsPerPage" onchange="this.form.submit()">
                    <option value="5" {{ $itemsPerPage == 5 ? 'selected' : '' }}>5</option>
                    <option value="10" {{ $itemsPerPage == 10 ? 'selected' : '' }}>10</option>
                    <option value="20" {{ $itemsPerPage == 20 ? 'selected' : '' }}>20</option>
                </select>

                <label for="tagFilter">Filtrar por tag:</label>
        <select id="tagFilter" name="tagFilter" onchange="this.form.submit()">
            <option value="">Todas</option>
            <option value="futebol" {{ $tagFilter == 'futebol' ? 'selected' : '' }}>Futebol</option>
            <option value="música" {{ $tagFilter == 'música' ? 'selected' : '' }}>Música</option>
            <option value="tecnologia" {{ $tagFilter == 'tecnologia' ? 'selected' : '' }}>Tecnologia</option>
            <option value="política" {{ $tagFilter == 'política' ? 'selected' : '' }}>Política</option>
            <option value="jogos" {{ $tagFilter == 'jogos' ? 'selected' : '' }}>Jogos</option>
        </select>
            </form>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
            @foreach ($noticias as $noticia)
                <div class="bg-white shadow-sm rounded-lg p-4">
                    <a href="{{ route('noticia.ver', ['id' => $noticia->id]) }}">
                        <img src="{{ asset('storage/' . $noticia->imagem) }}" alt="Noticia Image" class="mb-2" style="max-width: 200px; max-height: 200px;">
                    </a>
                    <h3 class="text-lg font-semibold">{{ $noticia->titulo }}</h3>
                    <p class="text-gray-600">{{ $noticia->user->name }}</p>
                    <p class="text-gray-600">{{ \Carbon\Carbon::parse($noticia->data)->locale('pt_BR')->isoFormat('D [de] MMMM [de] YYYY') }}</p>
                </div>
            @endforeach
        </div>
        <div class="mt-4">
            {{ $noticias->links() }}
        </div>
    </div>
</x-app-layout>