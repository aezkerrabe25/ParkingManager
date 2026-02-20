@extends('layouts.nagusia')

@section('edukia')
    <h2>Bilatu autoa</h2>
    
    <form method="GET">
        <input type="text" name="testua" placeholder="Sartu plaka..." value="{{ request('testua') }}">
        <button type="submit">Bilatu</button>
    </form>
    
    <hr>
    
    @if(request('testua'))
        @if(count($autoak) > 0)
            <h3>Emaitzak:</h3>
            <table border="1">
                <tr>
                    <th>Plaka</th><th>Marka</th><th>Modeloa</th><th>Jabea</th><th>Aukerak</th>
                </tr>
                @foreach($autoak as $autoa)
                    <tr>
                        <td>{{ $autoa->plaka }}</td>
                        <td>{{ $autoa->beraz }}</td>
                        <td>{{ $autoa->modeloa }}</td>
                        <td>
                            @if($autoa->jabea)
                                {{ $autoa->jabea->izena }} {{ $autoa->jabea->abizena }}
                            @else
                                -
                            @endif
                        </td>
                        <td>
                            <form method="POST" action="/autoa/{{ $autoa->id }}" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('Ziur zaude?')">Ezabatu</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </table>
        @else
            <p>Ez dago emaitzarik bilaketa horrekin.</p>
        @endif
    @endif
@endsection
