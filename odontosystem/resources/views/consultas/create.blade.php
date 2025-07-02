<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-100 leading-tight">
            {{ __('Nova Consulta') }}
        </h2>
    </x-slot>

    <div class="py-6 px-6 max-w-lg mx-auto bg-gray-800 rounded-lg shadow-md">
        <form method="POST" action="{{ route('consultas.store') }}">
            @csrf

            <div class="mb-4">
                <label for="data" class="block font-medium text-sm text-gray-100">Data</label>
                <input type="date" name="data" id="data" class="border rounded w-full px-3 py-2" value="{{ old('data') }}" required>
                @error('data')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="hora" class="block font-medium text-sm text-gray-100">Hora</label>
                <input type="time" name="hora" id="hora" class="border rounded w-full px-3 py-2" value="{{ old('hora') }}" required>
                @error('hora')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="status" class="block font-medium text-sm text-gray-100">Status</label>
                <input type="text" name="status" id="status" class="border rounded w-full px-3 py-2" value="{{ old('status') }}" required>
                @error('status')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="paciente_id" class="block font-medium text-sm text-gray-100">Paciente</label>
                <select name="paciente_id" id="paciente_id" class="border rounded w-full px-3 py-2" required>
                    <option value="">Selecione o paciente</option>
                    @foreach ($pacientes as $paciente)
                        <option value="{{ $paciente->id }}" {{ old('paciente_id') == $paciente->id ? 'selected' : '' }}>
                            {{ $paciente->nome }}
                        </option>
                    @endforeach
                </select>
                @error('paciente_id')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="dentista_id" class="block font-medium text-sm text-gray-100">Dentista</label>
                <select name="dentista_id" id="dentista_id" class="border rounded w-full px-3 py-2" required>
                    <option value="">Selecione o dentista</option>
                    @foreach ($dentistas as $dentista)
                        <option value="{{ $dentista->id }}" {{ old('dentista_id') == $dentista->id ? 'selected' : '' }}>
                            {{ $dentista->nome }}
                        </option>
                    @endforeach
                </select>
                @error('dentista_id')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                Cadastrar Consulta
            </button>
        </form>
    </div>
</x-app-layout>