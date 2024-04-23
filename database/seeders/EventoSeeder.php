<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\EventoCalendario;

class EventoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $feriados = [
            ['title' => 'Año Nuevo', 'start' => '2024-01-01', 'end' => '2024-01-01'],
            ['title' => 'Dia de reyes', 'start' => '2024-01-06', 'end' => '2024-01-06'],
            ['title' => 'Fundacion Estado Plurinacional', 'start' => '2024-01-22', 'end' => '2024-01-22'],
            ['title' => 'Carnaval', 'start' => '2024-02-12', 'end' => '2024-02-12'],
            ['title' => 'Carnaval', 'start' => '2024-02-13', 'end' => '2024-02-13'],
            ['title' => 'Dia del padre', 'start' => '2024-03-19', 'end' => '2024-03-19'],
            ['title' => 'Dia de la Reinvindicacion Maritima', 'start' => '2024-03-23', 'end' => '2024-03-23'],
            ['title' => 'Jueves santo', 'start' => '2024-03-28', 'end' => '2024-03-28'],
            ['title' => 'Viernes santo', 'start' => '2024-03-29', 'end' => '2024-03-29'],
            ['title' => 'Dia del niño', 'start' => '2024-04-12', 'end' => '2024-04-12'],
            ['title' => 'Dia del trabajo', 'start' => '2024-05-01', 'end' => '2024-05-01'],
            ['title' => 'Dia de la madre', 'start' => '2024-05-27', 'end' => '2024-05-27'],
            ['title' => 'Corpus Christi', 'start' => '2024-05-30', 'end' => '2024-05-30'],
            ['title' => 'Año nuevo aymara', 'start' => '2024-06-21', 'end' => '2024-06-21'],
            ['title' => 'Dia de la Independencia', 'start' => '2024-08-06', 'end' => '2024-08-06'],
            ['title' => 'Dia de bandera', 'start' => '2024-08-17', 'end' => '2024-08-17'],
            ['title' => 'Dia de la mujer boliviana', 'start' => '2024-09-11', 'end' => '2024-09-11'],
            ['title' => 'Dia de la dignidad nacional', 'start' => '2024-09-17', 'end' => '2024-09-17'],
            ['title' => 'Dia de todos santos', 'start' => '2024-11-02', 'end' => '2024-11-02'],
            ['title' => 'Navidad', 'start' => '2024-12-25', 'end' => '2024-12-25'],
        ];

        foreach ($feriados as $feriado) {
            EventoCalendario::create($feriado);
        }
    }
}
