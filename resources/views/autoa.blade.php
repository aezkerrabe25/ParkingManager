@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4 max-w-md">
    <h1 class="text-3xl font-bold mb-6">Autoa Gehitu</h1>

    @if($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="/autoa" method="POST" class="space-y-4">
        @csrf

        <div>
            <label for="marka" class="block text-sm font-medium text-gray-700">Marka</label>
            <input type="text" name="marka" id="marka" value="{{ old('marka') }}" required
                   class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm px-3 py-2">
            @error('marka')
                <span class="text-red-600 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div>
            <label for="modeloa" class="block text-sm font-medium text-gray-700">Modeloa</label>
            <input type="text" name="modeloa" id="modeloa" value="{{ old('modeloa') }}" required
                   class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm px-3 py-2">
            @error('modeloa')
                <span class="text-red-600 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div>
            <label for="matrikula" class="block text-sm font-medium text-gray-700">Matrikula</label>
            <input type="text" name="matrikula" id="matrikula" value="{{ old('matrikula') }}" required
                   class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm px-3 py-2">
            @error('matrikula')
                <span class="text-red-600 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div>
            <label for="urtea" class="block text-sm font-medium text-gray-700">Urtea</label>
            <input type="number" name="urtea" id="urtea" value="{{ old('urtea') }}" required
                   class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm px-3 py-2">
            @error('urtea')
                <span class="text-red-600 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div>
            <label for="erabiltzaile_id" class="block text-sm font-medium text-gray-700">Jabea</label>
            <select name="erabiltzaile_id" id="erabiltzaile_id" required
                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm px-3 py-2">
                <option value="">Aukeratu...</option>
                @foreach($erabiltzaileak as $erabiltzailea)
                    <option value="{{ $erabiltzailea->id }}" {{ old('erabiltzaile_id') == $erabiltzailea->id ? 'selected' : '' }}>
                        {{ $erabiltzailea->izena }}
                    </option>
                @endforeach
            </select>
            @error('erabiltzaile_id')
                <span class="text-red-600 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div class="flex gap-2">
            <button type="submit" class="flex-1 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                Gorde
            </button>
            <a href="/" class="flex-1 bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded text-center">
                Bertan behera
            </a>
        </div>
    </form>
</div>
@endsection
