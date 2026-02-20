@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-3xl font-bold mb-6">Autoak</h1>

    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <div class="mb-6">
        <a href="/autoa" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            Autoa Gehitu
        </a>
    </div>

    @if($autoak->count() > 0)
        <div class="overflow-x-auto">
            <table class="min-w-full border-collapse border border-gray-300">
                <thead class="bg-gray-200">
                    <tr>
                        <th class="border border-gray-300 px-4 py-2">Marka</th>
                        <th class="border border-gray-300 px-4 py-2">Modeloa</th>
                        <th class="border border-gray-300 px-4 py-2">Matrikula</th>
                        <th class="border border-gray-300 px-4 py-2">Urtea</th>
                        <th class="border border-gray-300 px-4 py-2">Jabea</th>
                        <th class="border border-gray-300 px-4 py-2">Ekintzak</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($autoak as $autoa)
                        <tr class="hover:bg-gray-100">
                            <td class="border border-gray-300 px-4 py-2">{{ $autoa->marka }}</td>
                            <td class="border border-gray-300 px-4 py-2">{{ $autoa->modeloa }}</td>
                            <td class="border border-gray-300 px-4 py-2">{{ $autoa->matrikula }}</td>
                            <td class="border border-gray-300 px-4 py-2">{{ $autoa->urtea }}</td>
                            <td class="border border-gray-300 px-4 py-2">{{ $autoa->jabea->izena ?? 'Ez dago' }}</td>
                            <td class="border border-gray-300 px-4 py-2">
                                <button onclick="ezabatu({{ $autoa->id }})" class="bg-red-500 hover:bg-red-700 text-white py-1 px-2 rounded text-sm">
                                    Ezabatu
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
        <p class="text-gray-600">Ez dago autorik gordetzerik.</p>
    @endif
</div>

<script>
function ezabatu(id) {
    if (confirm('Ziur al zaude autoa ezabatu nahi duzula?')) {
        fetch(`/autoa/${id}`, {
            method: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                location.reload();
            }
        });
    }
}
</script>
@endsection
