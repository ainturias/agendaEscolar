<?php


use App\Http\Controllers\AdminController;
use App\Http\Controllers\DeleteTemporaryImageController;
use App\Http\Controllers\StoreTareaController;
use App\Http\Controllers\UploadTemporaryImageController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TareaController;
use App\Http\Controllers\CalendarController;
use App\Http\Controllers\CsvController;
use App\Http\Controllers\PadreController;
use App\Models\Estudiante;
use App\Http\Controllers\EstudianteController;
use App\Http\Controllers\ProfesorController;
use App\Models\Anuncio;
use App\Http\Controllers\AnuncioController;
use App\Http\Controllers\ComentarioController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\StoreAnuncioController;
use App\Models\Profesor;
use App\Http\Controllers\MateriaController;
use App\Http\Controllers\TareaLeidaController;
use App\Models\AnuncioLeido;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AnuncioLeidoController;
use App\Http\Controllers\ViewProfesorController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::post('/upload',UploadTemporaryImageController::class);
Route::delete('/delete',DeleteTemporaryImageController::class);


// -----------------------------RUTAS CALENDARIO----------------------------------------
Route::get('/calendar',[CalendarController::class,'index'])->name('calendar');
Route::put('calendar/update/{id}', [CalendarController::class,'update'])->name('updateTarea');
Route::get('calendar/vistaTarea/{id}', [CalendarController::class, 'vistaTarea'])->name('vistaTarea');  
Route::get('calendar/vistaAnuncio/{id}', [CalendarController::class, 'vistaAnuncio'])->name('vistaAnuncio');

// -----------------------------RUTAS PADRES----------------------------------------
Route::resource('/padres', PadreController::class)->names('padres')->middleware('auth');;

// -----------------------------RUTAS ESTUDIANTES----------------------------------------
Route::resource('/estudiantes', EstudianteController::class)->names('estudiantes')->middleware('auth');;

// -----------------------------RUTAS PROFESORES----------------------------------------
Route::resource('/profesores', ProfesorController::class)->names('profesores')->middleware('auth');;
Route::post('/profe/{id}',[MateriaController::class, 'actualizarMaterias'])->name('profe.actualizarMaterias');

// -----------------------------RUTAS PADRES----------------------------------------
Route::resource('/administradores', AdminController::class)->names('administradores')->middleware('auth');;

// -----------------------------RUTAS EXCEL (CSV)----------------------------------------
Route::post('/importar/estudiantes', [CsvController::class, 'importEstudiantes'])->name('importarEstudiantes');
Route::post('/importar/padres', [CsvController::class, 'importPadres'])->name('importarPadres');
Route::post('/importar/profesores', [CsvController::class, 'importProfesor'])->name('importarProfesores');
Route::get('/exportar', [CsvController::class, 'export'])->name('exportar');

// -----------------------------RUTAS TAREAS----------------------------------------
Route::post('/store/tarea',StoreTareaController::class)->name('storeTarea');  //para guardar la informacion de la tarea creada
Route::resource('/tareas', TareaController::class)->names('tareas')->middleware('auth');;
Route::get('tarea/leida/{id}', [TareaLeidaController::class, 'tareaLeida'])->name('tareaLeida');  

// -----------------------------RUTAS ANUNCIOS----------------------------------------
Route::post('/store/Anuncio', StoreAnuncioController::class)->name('storeAnuncio'); //para guardar la informacion del anuncio creado
Route::resource('/anuncios', AnuncioController::class)->names('anuncios')->middleware('auth');;
Route::get('Anuncio/leido/{id}', [AnuncioLeidoController::class, 'anuncioLeido'])->name('anuncioLeido');  

//------------------------ COMENTARIOS -------------------------------------------------------
Route::resource('/comentarios',ComentarioController::class)->names('comentarios')->middleware('auth');;

//------------------------ TAREAS -------------------------------------------------------
Route::resource('/tareas', TareaController::class)->names('tareas')->middleware('auth');;

//------------------------------ VIEW PROFESOR ----------------------------------------
Route::resource('/viewProfesor', ViewProfesorController::class)->names('viewProfesor')->middleware('auth');;










