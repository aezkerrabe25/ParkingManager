@extends('layouts.nagusia')

@section('edukia')
    <h2>Auto berria gehitu</h2>
    @if($mezua)
        <p style="color: red;">{{ $mezua }}</p>
    @endif
    <form action="/autoa" method="POST">
        @csrf
        Plaka: <input type="text" name="plaka"><br>
        Marka: <input type="text" name="beraz"><br>
        Modeloa: <input type="text" name="modeloa"><br>
        <button type="submit">Gorde</button>
            <h3>Jabea hautatu edo berria sortu</h3>
            Erabiltzaile zaharra: 
            <select name="erabiltzaile_hautatua">
                <option value="">-- Hautatu --</option>
                @foreach($erabiltzaileak as $e)
                    <option value="{{ $e->id }}">{{ $e->izena }}</option>
                @endforeach
            </select>

            <p>EDO sortu berria:</p>
            Izena: <input type="text" name="erabiltzaile_berria_izena"><br>
            Abizena: <input type="text" name="erabiltzaile_berria_abizena"><br>
            Posta: <input type="email" name="posta">
    </form>
@endsection