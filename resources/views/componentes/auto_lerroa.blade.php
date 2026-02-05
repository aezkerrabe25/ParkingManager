<tr>
    <td>{{ $autoa->plaka }}</td>
    <td>{{ $autoa->beraz }}</td>
    <td>{{ $autoa->modeloa }}</td>
    <td>
        <form action="/autoa/{{ $autoa->id }}" method="POST">
            @csrf
            @method('DELETE')
            <td>{{ $autoa->jabea ? $autoa->jabea->izena : 'Jaberik gabe' }}</td>
            <button type="submit">Ezabatu</button>
        </form>
    </td>
</tr>