<?php

use App\Http\Controllers\AutoKontrolatzailea;
use Illuminate\Support\Facades\Route;

Route::get('/', [AutoKontrolatzailea::class, 'zerrenda']);
Route::get('/autoa', [AutoKontrolatzailea::class, 'formularioa']);
Route::post('/autoa', [AutoKontrolatzailea::class, 'gorde']);
Route::delete('/autoa/{id}', [AutoKontrolatzailea::class, 'ezabatu']);
Route::get('/bilatu', [AutoKontrolatzailea::class, 'bilatu']);

Route::get('/bilaketa-aurreratua', [AutoKontrolatzailea::class, 'bilaketaAurreratuaIkuspegia']);
Route::post('/bilaketa-aurreratua', [AutoKontrolatzailea::class, 'bilaketaAurreratua']);