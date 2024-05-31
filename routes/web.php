<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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

// A partir de aquí

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/portafolio', function () {
    $portafolios = [
        
        ['nombre' => 'SOFWARE PARA EMPRESAS DE DISEÑO ', 'descripcion' => ' creamos opciones practicas para  tus proyectos '],
        ['nombre' => 'CREATIVE SCHOOL', 'descripcion' => 'por que pensamos en nuestros niños creamos aplicacones para ellos '],
        ['nombre' => 'SOFWARE ADMINISTRATIVO', 'descripcion' => 'creamos soporte y asignacion de proyectos para tu empresa '],
        ['nombre' => 'SOFWARE PARA NIÑOS', 'descripcion' => 'opciones didacticas para niños'],
        ['nombre' => 'DIAGRAMACION', 'descripcion' => 'diagramamos y adecamos  tus proyectos a tus necesidades'],
        ['nombre' => 'SOFWARE PARA PEQUEÑOS EMPRENDEDORES', 'descripcion' => 'creamos tu sofware de acuerdo  a tus necesidades'],
    ];

    return view('portafolio', ['portafolios' => $portafolios]);
})->name('portafolio');

Route::get('/servicios', function () {
    $servicios = [
        
        ['nombre' => 'SOFWARE PARA EMPRESAS DE DISEÑO', 'descripcion' => 'creamos opciones practicas para  tus proyectos'],
        ['nombre' => 'CREATIVE SCHOOL', 'descripcion' => 'por que pensamos en nuestros niños creamos aplicacones para ellos'],
        ['nombre' => 'SOFWARE ADMINISTRATIVO', 'descripcion' => 'creamos soporte y asignacion de proyectos para tu empresa '],
        ['nombre' => 'SOFWARE PARA NIÑOS', 'descripcion' => 'opciones didacticas para niños'],
        ['nombre' => 'DIAGRAMACION', 'descripcion' => 'por que pensamos  etn ti  creamos sofware para  diagramar  tus ideas '],
        ['nombre' => 'SOFWARE PARA PEQUEÑOS EMPRENDEDORES', 'descripcion' => 'creamos tu sofware de acuerdo  a tus necesidades'],
    ];

    return view('servicios', ['servicios' => $servicios]);
})->name('servicios');

Route::get('/nosotros', function () {
    return view('nosotros');
})->name('nosotros');



// Esas rutas son de la autenticacion no las vaya a mover
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

