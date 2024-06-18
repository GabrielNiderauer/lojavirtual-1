<x-app-layout>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-6">

        <!-- Mensagem de sucesso (opcional) -->
         <!-- alteração para commit teste-->
        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                <strong class="font-bold">Sucesso!</strong>
                <span class="block sm:inline">{{ session('success') }}</span>
                <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                    <svg class="fill-current h-6 w-6 text-green-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                        <path d="M6.293 11.293a1 1 0 011.414 0L10 15.586l2.293-2.293a1 1 0 011.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z" clip-rule="evenodd" fill-rule="evenodd" />
                    </svg>
                </span>
            </div>
        @endif

        <br>
        <a class="inline-flex items-center px-4 py-2 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-500 rounded-md font-semibold text-xs text-gray-700 dark:text-gray-300 uppercase tracking-widest shadow-sm hover:bg-gray-50 dark:hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 disabled:opacity-25 transition ease-in-out duration-150" href="{{ url('/dashboard') }}">Voltar</a>
        <a class="inline-flex items-center px-4 py-2 bg-white dark:bg-gray-100 border border-gray-300 dark:border-gray-500 rounded-md font-semibold text-xs text-gray-700 dark:text-gray-900 uppercase tracking-widest shadow-sm hover:bg-gray-50 dark:hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 disabled:opacity-25 transition ease-in-out duration-150" href="{{ url('/types/new') }}">Cadastrar</a>

        <br><br>

        <table class="min-w-full bg-white text-center">
            <thead>
                <tr>
                    <th class="py-2 px-4 border-b-2 border-gray-200">Nome</th>
                    <th class="py-2 px-4 border-b-2 border-gray-200">Ações</th>
                </tr>
            </thead>
            <tbody>

                @foreach($types as $type)
                <tr>
                    <td class="py-2 px-4 border-b border-gray-200">{{ $type->name }}</td>
                    <td class="py-2 px-4 border-b border-gray-200">
                        <a class="inline-flex items-center px-4 py-2 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-500 rounded-md font-semibold text-xs text-gray-700 dark:text-gray-300 uppercase tracking-widest shadow-sm hover:bg-gray-50 dark:hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 disabled:opacity-25 transition ease-in-out duration-150" href="{{ url('/types/update', ['id' => $type->id]) }}">Editar</a>
                        <a class="inline-flex items-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-500 active:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150" href="{{ url('/types/delete', ['id' => $type->id]) }}" onclick="return confirma(this)">Deletar</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>



<script>
    function confirma(element) {
        // Exibe o diálogo de confirmação
        if (confirm("Tem certeza de que deseja excluir este tipo?")) {
            return true;
        }
        return false;

    }
</script>