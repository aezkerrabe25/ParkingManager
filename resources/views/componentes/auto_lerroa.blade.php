<tr>
    <td>{{ $autoa->plaka }}</td>
    <td>{{ $autoa->beraz }}</td>
    <td>{{ $autoa->modeloa }}</td>
    <td>{{ $autoa->jabea ? $autoa->jabea->izena . ' ' . $autoa->jabea->abizena : 'Jaberik gabe' }}</td>
    <td>
        <form action="/autoa/{{ $autoa->id }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit" onclick="return confirm('Ziur zaude?')">Ezabatu</button>
        </form>
    </td>
</tr>