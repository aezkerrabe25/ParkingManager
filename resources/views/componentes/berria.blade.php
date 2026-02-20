@extends('layouts.nagusia')

@section('edukia')
    <h2>Auto berria gehitu</h2>
    @if($mezua)
        <p style="color: red;">{{ $mezua }}</p>
    @endif
    <form action="/autoa" method="POST">
        @csrf
        Plaka: <input type="text" name="plaka" required><br>
        Marka: <input type="text" name="beraz" required><br>
        Modeloa: <input type="text" name="modeloa" required><br>
        
        <h3>Jabea hautatu edo berria sortu</h3>
        <strong>Erabiltzaile zaharra:</strong>
        <select name="erabiltzaile_hautatua">
            <option value="">-- Hautatu --</option>
            @foreach($erabiltzaileak as $e)
                <option value="{{ $e->id }}">{{ $e->izena }} {{ $e->abizena }}</option>
            @endforeach
        </select>
        <br><br>

        <strong>EDO sortu berria:</strong><br>
        Izena: <input type="text" name="erabiltzaile_berria_izena"><br>
        Abizena: <input type="text" name="erabiltzaile_berria_abizena"><br>
        Posta: <input type="email" name="posta"><br>
        <br>
        
        <button type="submit">Gorde</button>
    </form>
@endsection