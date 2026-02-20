<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Erabiltzailea;
use App\Models\Autoa;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::firstOrCreate(
            ['email' => 'test@example.com'],
            [
                'name' => 'Test User',
                'password' => \Illuminate\Support\Facades\Hash::make('password'),
            ]
        );

        // Crear erabiltzaileak (usuarios)
        $erabiltzailea1 = Erabiltzailea::firstOrCreate([
            'posta_elektronikoa' => 'juan@example.com'
        ], [
            'izena' => 'Juan',
            'abizena' => 'García',
        ]);

        $erabiltzailea2 = Erabiltzailea::firstOrCreate([
            'posta_elektronikoa' => 'maria@example.com'
        ], [
            'izena' => 'María',
            'abizena' => 'Rodríguez',
        ]);

        $erabiltzailea3 = Erabiltzailea::firstOrCreate([
            'posta_elektronikoa' => 'pedro@example.com'
        ], [
            'izena' => 'Pedro',
            'abizena' => 'Martínez',
        ]);

        // Crear autoak (autos)
        Autoa::firstOrCreate([
            'matrikula' => '1234ABC'
        ], [
            'marka' => 'Toyota',
            'modeloa' => 'Corolla',
            'urtea' => 2020,
            'erabiltzaile_id' => $erabiltzailea1->id,
        ]);

        Autoa::firstOrCreate([
            'matrikula' => '5678DEF'
        ], [
            'marka' => 'Nissan',
            'modeloa' => 'Altima',
            'urtea' => 2019,
            'erabiltzaile_id' => $erabiltzailea2->id,
        ]);

        Autoa::firstOrCreate([
            'matrikula' => '9012GHI'
        ], [
            'marka' => 'Honda',
            'modeloa' => 'Civic',
            'urtea' => 2021,
            'erabiltzaile_id' => $erabiltzailea3->id,
        ]);
    }
}
