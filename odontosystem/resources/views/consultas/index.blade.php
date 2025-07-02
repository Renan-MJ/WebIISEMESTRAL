<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 text-white leading-tight">
            {{ __('Consultas') }}
        </h2>
    </x-slot>

    <div class="py-6 px-6 max-w-4xl mx-auto text-gray-800 text-white">
        <h1 class="text-lg font-bold mb-4">Lista de Consultas</h1>

        @if(session('success'))
            <div class="mb-4 p-3 bg-green-600 text-white rounded">
                {{ session('success') }}
            </div>
         @endif

        <a href="{{ route('consultas.create') }}" class="bg-green-600 text-white px-3 py-2 rounded hover:bg-green-700 inline-block mb-4">
            + Nova Consulta
        </a>

        <table class="table-auto border w-full">
            <thead>
                <tr class="bg-gray-800 text-white">
                    <th class="border px-4 py-2">Data</th>
                    <th class="border px-4 py-2">Hora</th>
                    <th class="border px-4 py-2">Status</th>
                    <th class="border px-4 py-2">Paciente</th>
                    <th class="border px-4 py-2">Dentista</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($consultas as $consulta)
                    <tr>
                        <td class="border px-4 py-2">{{ $consulta->data }}</td>
                        <td class="border px-4 py-2">{{ $consulta->hora }}</td>
                        <td class="border px-4 py-2">{{ $consulta->status }}</td>
                        <td class="border px-4 py-2">{{ $consulta->paciente->nome ?? 'Sem paciente' }}</td>
                        <td class="border px-4 py-2">{{ $consulta->dentista->nome ?? 'Sem dentista' }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center py-4">Nenhuma consulta cadastrada.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</x-app-layout>