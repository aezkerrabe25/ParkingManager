@extends('layouts.nagusia')

@section('edukia')
    <h2>Bilaketa emaitzak</h2>
    
    @if(count($autoak) > 0)
        <table border="1">
            <tr>
                <th>Plaka</th><th>Marka</th><th>Modeloa</th><th>Jabea</th><th>Aukerak</th>
            </tr>
            @each('componentes.auto_lerroa', $autoak, 'autoa')
        </table>
    @else
        <p>Ez dago emaitzarik.</p>
    @endif
    
    <br>
    <a href="/bilatu">Atzera</a>
@endsection
