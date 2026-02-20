<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BilaketaAurreratua extends Controller
{
    public function bilaketaAurreratua(Request $eskaera) {
        $data = $eskaera->input('data');
        $erabiltzaile_id = $eskaera->input('erabiltzaile_id');

        $kontsulta = Autoa::query();

        if ($data) {
            $kontsulta->whereDate('created_at', $data);
        }

        if ($erabiltzaile_id) {
            $kontsulta->where('erabiltzaile_id', $erabiltzaile_id);
        }

        $emaitzak = $kontsulta->get();
        return view('bilaketa_aurreratua', ['autoak' => $emaitzak, 'erabiltzaileak' => Erabiltzailea::all()]);
    }
}
