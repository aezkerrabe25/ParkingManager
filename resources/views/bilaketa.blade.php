@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-3xl font-bold mb-6">Bilatu autoa</h1>
    
    <form method="GET" class="mb-6 p-4 bg-white rounded shadow">
        <div class="flex gap-2">
            <input type="text" name="q" placeholder="Sartu marka, modeloa edo matrikula..." 
                   value="{{ request('q') }}" class="flex-1 border border-gray-300 rounded px-3 py-2">
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                Bilatu
            </button>
        </div>
    </form>
    
    @if(request('q'))
        @if(count($autoak) > 0)
            <h3 class="text-xl font-bold mb-4">Emaitzak ({{ count($autoak) }})</h3>
            <div class="overflow-x-auto">
                <table class="min-w-full border-collapse border border-gray-300">
                    <thead class="bg-gray-200">
                        <tr>
                            <th class="border border-gray-300 px-4 py-2">Matrikula</th>
                            <th class="border border-gray-300 px-4 py-2">Marka</th>
                            <th class="border border-gray-300 px-4 py-2">Modeloa</th>
                            <th class="border border-gray-300 px-4 py-2">Urtea</th>
                            <th class="border border-gray-300 px-4 py-2">Jabea</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($autoak as $autoa)
                            <tr class="hover:bg-gray-100">
                                <td class="border border-gray-300 px-4 py-2">{{ $autoa->matrikula }}</td>
                                <td class="border border-gray-300 px-4 py-2">{{ $autoa->marka }}</td>
                                <td class="border border-gray-300 px-4 py-2">{{ $autoa->modeloa }}</td>
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
            <p class="text-gray-600 text-lg">Ez dago emaitzarik bilaketa horrekin: "<strong>{{ request('q') }}</strong>"</p>
        @endif
    @else
        <p class="text-gray-600">Bilaketa egin nahi baduzu, sartu zerbait goian.</p>
    @endif
</div>
