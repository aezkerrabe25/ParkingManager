<?php

namespace App\Http\Controllers;

use App\Models\Autoa;
use App\Models\Erabiltzailea;
use Illuminate\Http\Request;

class AutoKontrolatzailea extends Controller
{
    /**
     * Zerrenda - Muestra lista de todos los autos
     */
    public function zerrenda()
    {
        $autoak = Autoa::with('jabea')->get();
        return view('zerrenda', ['autoak' => $autoak]);
    }

    /**
     * Formularioa - Muestra el formulario para crear un auto
     */
    public function formularioa()
    {
        $erabiltzaileak = Erabiltzailea::all();
        return view('autoa', ['erabiltzaileak' => $erabiltzaileak]);
    }

    /**
     * Gorde - Guarda un nuevo auto o actualiza uno existente
     */
    public function gorde(Request $request)
    {
        $validated = $request->validate([
            'marka' => 'required|string|max:255',
            'modeloa' => 'required|string|max:255',
            'matrikula' => 'required|string|unique:autoak,matrikula',
            'urtea' => 'required|integer|min:1900|max:2100',
            'erabiltzaile_id' => 'required|exists:erabiltzaileak,id',
        ]);

        Autoa::create($validated);

        return redirect('/')->with('success', 'Autoa gehitu da ondo');
    }

    /**
     * Ezabatu - Elimina un auto
     */
    public function ezabatu($id)
    {
        $autoa = Autoa::findOrFail($id);
        $autoa->delete();

        return response()->json(['success' => true, 'message' => 'Autoa ezabatu da ondo']);
    }

    /**
     * Bilatu - Busca autos por matrícula
     */
    public function bilatu(Request $request)
    {
        $bilaketa = $request->query('q');
        
        if (!$bilaketa) {
            return redirect('/');
        }

        $autoak = Autoa::where('matrikula', 'like', "%$bilaketa%")
                       ->orWhere('marka', 'like', "%$bilaketa%")
                       ->orWhere('modeloa', 'like', "%$bilaketa%")
                       ->with('jabea')
                       ->get();

        return view('bilaketa', ['autoak' => $autoak, 'bilaketa' => $bilaketa]);
    }

    /**
     * BilaketaAurreratuaIkuspegia - Muestra la vista de búsqueda avanzada
     */
    public function bilaketaAurreratuaIkuspegia()
    {
        $marcak = Autoa::select('marka')->distinct()->get();
        return view('bilaketa-aurreratua', ['marcak' => $marcak]);
    }

    /**
     * BilaketaAurreratua - Realiza búsqueda avanzada
     */
    public function bilaketaAurreratua(Request $request)
    {
        $query = Autoa::query();

        if ($request->filled('marka')) {
            $query->where('marka', $request->marka);
        }

        if ($request->filled('modeloa')) {
            $query->where('modeloa', 'like', "%{$request->modeloa}%");
        }

        if ($request->filled('urtea_min')) {
            $query->where('urtea', '>=', $request->urtea_min);
        }

        if ($request->filled('urtea_max')) {
            $query->where('urtea', '<=', $request->urtea_max);
        }

        if ($request->filled('matrikula')) {
            $query->where('matrikula', 'like', "%{$request->matrikula}%");
        }

        $autoak = $query->with('jabea')->get();
        $marcak = Autoa::select('marka')->distinct()->get();

        return view('bilaketa-aurreratua', [
            'autoak' => $autoak,
            'marcak' => $marcak,
            'filtros' => $request->all()
        ]);
    }
}
