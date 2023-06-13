<x-app-layout>
    @if(session('noticiaUpdate'))
    <script>
    Swal.fire({
        icon: 'success',
        title: 'Dados atualizados!',
        showConfirmButton: false,
        timer: 5000
    })
    </script>
    @endif
    @if(session('noticiaDelete'))
    <script>
    Swal.fire({
        icon: 'success',
        title: 'Noticia excluida com sucesso!',
        showConfirmButton: false,
        timer: 5000
    })
    </script>
    @endif
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Minhas Noticias') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <table class="min-w-full divide-y divide-gray-200" id="exemplo">
                        <thead>
                            <tr>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">{{ __('ID') }}</th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">{{ __('Titulo') }}</th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">{{ __('Descrição') }}</th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">{{ __('Data') }}</th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">{{ __('Ações') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($noticias as $noticia)
                                <tr>
                                    <td class="px-6 py-4 whitespace-no-wrap">{{ $noticia->id }}</td>
                                    <td class="px-6 py-4 whitespace-no-wrap">{{ $noticia->titulo }}</td>
                                    <td class="px-6 py-4 whitespace-no-wrap">{{ Str::limit($noticia->descricao, 50) }}</td>
                                    <td class="px-6 py-4 whitespace-no-wrap">{{ $noticia->data }}</td>
                                    <td class="px-6 py-4 whitespace-no-wrap">
                                        <a href="{{route('noticia.editar', $noticia->id)}}" class="text-indigo-600 hover:text-indigo-900">Editar</a>
                                        <form class="inline-block" action="{{ route('noticia.destroy', $noticia->id) }}" method="POST" onsubmit="return confirm('Tem certeza que deseja excluir esta notícia?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:text-red-900">Excluir</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css">
    <script>
        $(document).ready(function () {
        $('#exemplo').DataTable({
            select: false,
            responsive: true,
            "order": [
                [0, "asc"]
            ],
            "info": false,
            "sLengthMenu": false,
            "bLengthChange": false,
            "oLanguage": {
    
                "sEmptyTable": "Nenhum registro encontrado",
                "sInfo": "Mostrando de START até END de TOTAL registros",
                "sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
                "sInfoFiltered": "(Filtrados de MAX registros)",
                "sInfoPostFix": "",
                "sInfoThousands": ".",
                "sLengthMenu": "MENU resultados por página",
                "sLoadingRecords": "Carregando...",
                "sProcessing": "Processando...",
                "sZeroRecords": "Nenhum registro encontrado",
                "sSearch": "Pesquisar",
                "oPaginate": {
                    "sNext": "Próximo",
                    "sPrevious": "Anterior",
                    "sFirst": "Primeiro",
                    "sLast": "Último"
                },
                "oAria": {
                    "sSortAscending": ": Ordenar colunas de forma ascendente",
                    "sSortDescending": ": Ordenar colunas de forma descendente"
                }
            }
        });
    });
    </script>
</x-app-layout>
