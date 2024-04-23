<?php

namespace App\Http\Controllers;

use App\Models\Anuncio;
use Illuminate\Http\Request;
use App\Models\Tarea;
use App\Models\Materia;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Support\Facades\Auth;
use App\Models\EventoCalendario;


class CalendarController extends Controller
{
    public function index()
    {
        $user = User::find(auth()->user()->id);
        $events = array();
        $eventos = EventoCalendario::all();

        if ($user->hasRole('Profesor')) {
            $permiso = true;

            $tareas = $user->profesor->tareas;
            //  $materias = Materia::all();
            $events = array();
            if ($tareas) {

                foreach ($tareas as $tarea) {
                    $color = '#49AF52';
                    $event = array(
                        'id' => $tarea->id,
                        'title' => $tarea->titulo,
                        'start' => $tarea->startDate,
                        'end' => $tarea->endDate,
                        // 'color' => $color,
                        'backgroundColor' => $color, //red
                        'borderColor'    => $color, //red
                        'allDay' => true,
                        'tipo' => 'tarea',

                    );
                    array_push($events, $event);
                }
            }
        }

        if ($user->hasRole('Admin')) {
            $permiso = true;

            $anuncios = $user->admin->anuncios;
            //  $materias = Materia::all();

            if ($anuncios) {
                foreach ($anuncios as $anuncio) {
                    $color = '#FF4040';
                    $event = array(
                        'id' => $anuncio->id,
                        'title' => $anuncio->titulo,
                        'start' => $anuncio->startDate,
                        'end' => $anuncio->endDate,
                        // 'color' => $color,
                        'backgroundColor' => $color, //red
                        'borderColor'    => $color, //red
                        'allDay' => true,
                        'tipo' => 'anuncio',
                    );
                    array_push($events, $event);
                }
            }
        }



        if ($user->hasRole('Estudiante') || $user->hasRole('Padre')) {
            $permiso = false;

            $tareas = $user->tareasLeidas;
            $anuncios = $user->anunciosLeidos;     //  $materias = Materia::all();

            if ($tareas) {

                foreach ($tareas as $tarea) {
                    $color = '#49AF52';
                    $event = array(
                        'id' => $tarea->id,
                        'title' => $tarea->titulo,
                        'start' => $tarea->startDate,
                        'end' => $tarea->endDate,
                        // 'color' => $color,
                        'backgroundColor' => $color, //red
                        'borderColor'    => $color, //red
                        'allDay' => true,
                        'tipo' => 'tarea',

                    );
                    array_push($events, $event);
                }
            }

            if ($anuncios) {
                foreach ($anuncios as $anuncio) {
                    $color = '#FF4040';
                    $event = array(
                        'id' => $anuncio->id,
                        'title' => $anuncio->titulo,
                        'start' => $anuncio->startDate,
                        'end' => $anuncio->endDate,
                        // 'color' => $color,
                        'backgroundColor' => $color, //red
                        'borderColor'    => $color, //red
                        'allDay' => true,
                        'tipo' => 'anuncio',
                    );
                    array_push($events, $event);
                }
            }
        }

        foreach ($eventos as $evento) {
            $color = '#EADF00';
            $event = array(
                'id' => $evento->id,
                'title' => $evento->title,
                'start' => $evento->start,
                'end' => $evento->end,
                // 'color' => $color,
                'backgroundColor' => $color, //red
                'borderColor'    => $color, //red
                'allDay' => true,
                'tipo' => 'evento',
            );
            array_push($events, $event);
        }

        return view('calendar/index', compact('events', 'permiso'));
    }




    public function update(Request $request, $id)
    {

        if ($request->tipo == 'tarea') {
            $tarea = Tarea::find($id);

            if (!$tarea) {
                return response()->json([
                    'message' => 'Tarea no encontrada'
                ], 404);
            }
            $tarea->update([
                'startDate' => $request->startDate,
                'endDate' => $request->endDate,
            ]);

            return response()->json([
                'message' => 'Tarea actualizada',
                'tarea' => $tarea
            ], 200);
        } else {

            $anuncio = Anuncio::find($id);

            if (!$anuncio) {
                return response()->json([
                    'message' => 'Anuncio no encontrado'
                ], 404);
            }
            $anuncio->update([
                'startDate' => $request->startDate,
                'endDate' => $request->endDate,
            ]);

            return response()->json([
                'message' => 'Anuncio actualizado',
                'anuncio' => $anuncio
            ], 200);
        }
    }



    public function vistaTarea($id)
    {
        $tarea = Tarea::find($id);
        return view('tareas.show', compact('tarea'));
    }
    public function vistaAnuncio($id)
    {
        $anuncio = Anuncio::find($id);
        return view('anuncios.show', compact('anuncio'));
    }
}
