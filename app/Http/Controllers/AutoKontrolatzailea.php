<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Autoa;
use App\Models\Erabiltzailea;

class AutoKontrolatzailea extends Controller
{
    public function zerrenda() {
        $autoak = Autoa::all();
        return view('zerrenda', ['autoak' => $autoak]);
    }

    public function formularioa($errorea = null) {
        $erabiltzaileak = Erabiltzailea::all();
        return view('berria', ['erabiltzaileak' => $erabiltzaileak, 'mezua' => $errorea]);
    }
    

    public function gorde(Request $eskaera) {
        if ($eskaera->input('erabiltzaile_berria_izena')) {
            $jabea = new Erabiltzailea();
            $jabea->izena = $eskaera->input('erabiltzaile_berria_izena');
            $jabea->abizena = $eskaera->input('erabiltzaile_berria_abizena');
            $jabea->posta_elektronikoa = $eskaera->input('posta');
            $jabea->save();
            $jabe_id = $jabea->id;
        } else {
            $jabe_id = $eskaera->input('erabiltzaile_hautatua');
        }

        $autoa = new Autoa();
        $autoa->plaka = $eskaera->input('plaka');
        $autoa->beraz = $eskaera->input('beraz');
        $autoa->modeloa = $eskaera->input('modeloa');
        $autoa->erabiltzaile_id = $jabe_id;
        $autoa->save();

        return redirect('/');
    }

    public function ezabatu($id) {
        $autoa = Autoa::find($id);
        $autoa->delete();
        return redirect('/');
    }

    public function bilatu(Request $eskaera) {
        $testua = $eskaera->input('testua');
        $autoak = Autoa::where('plaka', 'like', "%$testua%")->get();
        return view('bilatzailea', ['autoak' => $autoak]);
    }
}