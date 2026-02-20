@extends('layouts.nagusia')

@section('edukia')
    <h2>Bilaketa aurreratua</h2>
    
    <form method="POST">
        @csrf
        <label for="plaka">Plaka:</label>
        <input type="text" id="plaka" name="plaka" value="{{ old('plaka') }}"><br><br>
        
        <label for="jabea">Jabea:</label>
        <input type="text" id="jabea" name="jabea" value="{{ old('jabea') }}" placeholder="Izena edo abizena"><br><br>
        
        <button type="submit">Bilatu</button>
    </form>
    
    <hr>
    
    @if(isset($autoak) && count($autoak) > 0)
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
    @elseif(isset($autoak))
        <p>Ez dago emaitzarik.</p>
    @endif
@endsection
