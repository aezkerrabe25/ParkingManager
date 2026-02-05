@extends('layouts.nagusia')

@section('edukia')
    <h2>Autoen zerrenda</h2>
    <table border="1">
        <tr>
            <th>Plaka</th><th>Marka</th><th>Modeloa</th><th>Aukerak</th>
        </tr>
        @each('partials.auto_lerroa', $autoak, 'autoa')
    </table>
@endsection