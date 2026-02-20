@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-3xl font-bold mb-6">Bilaketa Aurreratua</h1>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <!-- Formulario de búsqueda -->
        <div class="md:col-span-1 bg-white p-4 rounded shadow">
            <h2 class="text-xl font-bold mb-4">Filtrak</h2>
            <form method="POST" action="/bilaketa-aurreratua" class="space-y-4">
                @csrf

                <div>
                    <label for="marka" class="block text-sm font-medium text-gray-700">Marka</label>
                    <select name="marka" id="marka" class="mt-1 block w-full border border-gray-300 rounded px-3 py-2">
                        <option value="">Guztiak</option>
                        @if(isset($marcak))
                            @foreach($marcak as $marca)
                                <option value="{{ $marca->marka }}" {{ isset($filtros['marka']) && $filtros['marka'] == $marca->marka ? 'selected' : '' }}>
                                    {{ $marca->marka }}
                                </option>
                            @endforeach
                        @endif
                    </select>
                </div>

                <div>
                    <label for="modeloa" class="block text-sm font-medium text-gray-700">Modeloa</label>
                    <input type="text" name="modeloa" id="modeloa" value="{{ $filtros['modeloa'] ?? '' }}"
                           placeholder="Sartu modeloa..." class="mt-1 block w-full border border-gray-300 rounded px-3 py-2">
                </div>

                <div>
                    <label for="matrikula" class="block text-sm font-medium text-gray-700">Matrikula</label>
                    <input type="text" name="matrikula" id="matrikula" value="{{ $filtros['matrikula'] ?? '' }}"
                           placeholder="Sartu matrikula..." class="mt-1 block w-full border border-gray-300 rounded px-3 py-2">
                </div>

                <div>
                    <label for="urtea_min" class="block text-sm font-medium text-gray-700">Urte minimoa</label>
                    <input type="number" name="urtea_min" id="urtea_min" value="{{ $filtros['urtea_min'] ?? '' }}"
                           placeholder="1900" class="mt-1 block w-full border border-gray-300 rounded px-3 py-2">
                </div>

                <div>
                    <label for="urtea_max" class="block text-sm font-medium text-gray-700">Urte maximoa</label>
                    <input type="number" name="urtea_max" id="urtea_max" value="{{ $filtros['urtea_max'] ?? '' }}"
                           placeholder="2026" class="mt-1 block w-full border border-gray-300 rounded px-3 py-2">
                </div>

                <div class="flex gap-2">
                    <button type="submit" class="flex-1 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        Bilatu
                    </button>
                    <a href="/bilaketa-aurreratua" class="flex-1 bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded text-center">
                        Garbitu
                    </a>
                </div>
            </form>
        </div>

        <!-- Resultados -->
        <div class="md:col-span-2 bg-white p-4 rounded shadow">
            @if(isset($autoak) && count($autoak) > 0)
                <h2 class="text-xl font-bold mb-4">Emaitzak ({{ count($autoak) }})</h2>
                <div class="overflow-x-auto">
                    <table class="min-w-full border-collapse border border-gray-300">
                        <thead class="bg-gray-200">
                            <tr>
                                <th class="border border-gray-300 px-4 py-2">Marka</th>
                                <th class="border border-gray-300 px-4 py-2">Modeloa</th>
                                <th class="border border-gray-300 px-4 py-2">Matrikula</th>
                                <th class="border border-gray-300 px-4 py-2">Urtea</th>
                                <th class="border border-gray-300 px-4 py-2">Jabea</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($autoak as $autoa)
                                <tr class="hover:bg-gray-100">
                                    <td class="border border-gray-300 px-4 py-2">{{ $autoa->marka }}</td>
                                    <td class="border border-gray-300 px-4 py-2">{{ $autoa->modeloa }}</td>
                                    <td class="border border-gray-300 px-4 py-2">{{ $autoa->matrikula }}</td>
                                    <td class="border border-gray-300 px-4 py-2">{{ $autoa->urtea }}</td>
                                    <td class="border border-gray-300 px-4 py-2">
                                        @if($autoa->jabea)
                                            {{ $autoa->jabea->izena }}
                                        @else
                                            -
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <p class="text-gray-600">Aukeratu filtro batzuk bilaketa egiteko.</p>
            @endif
        </div>
    </div>
</div>
@endsection
