<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PersonaController;
use App\Http\Controllers\DosisController;

use App\Exports\PersonasExport;
use Maatwebsite\Excel\Facades\Excel;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [
    HomeController::class, 'index'
])->name('home');


Route::get('generator_builder', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@builder')->name('io_generator_builder');

Route::get('field_template', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@fieldTemplate')->name('io_field_template');

Route::get('relation_field_template', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@relationFieldTemplate')->name('io_relation_field_template');

Route::post('generator_builder/generate', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@generate')->name('io_generator_builder_generate');

Route::post('generator_builder/rollback', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@rollback')->name('io_generator_builder_rollback');

Route::post(
    'generator_builder/generate-from-file',
    '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@generateFromFile'
)->name('io_generator_builder_generate_from_file');

Route::get('generator_builder', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@builder')->name('io_generator_builder');

Route::get('field_template', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@fieldTemplate')->name('io_field_template');

Route::get('relation_field_template', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@relationFieldTemplate')->name('io_relation_field_template');

Route::post('generator_builder/generate', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@generate')->name('io_generator_builder_generate');

Route::post('generator_builder/rollback', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@rollback')->name('io_generator_builder_rollback');

Route::post(
    'generator_builder/generate-from-file',
    '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@generateFromFile'
)->name('io_generator_builder_generate_from_file');

Route::resource('products', App\Http\Controllers\ProductController::class);

Route::resource('tests', App\Http\Controllers\TestController::class);

Route::resource('personas', App\Http\Controllers\PersonaController::class);

Route::resource('puntoVacunacions', App\Http\Controllers\Punto_vacunacionController::class);

Route::resource('brigadas', App\Http\Controllers\BrigadaController::class);

Route::resource('catalogos', App\Http\Controllers\CatalogoController::class);

Route::resource('items', App\Http\Controllers\ItemController::class);

Route::resource('usuarios', App\Http\Controllers\UsuarioController::class);

Route::get('/excel', function () {
    return Excel::download(new PersonasExport, 'personas.xlsx');
});



//Route::get('/test', [
//    PersonaController::class, 'export'
//])->name('test');



Route::get('/test', [
    PersonaController::class, 'test'
])->name('test');


Route::get('/informe', [
    PersonaController::class, 'informe'
])->name('informe');


Route::get('/excel', [
    PersonaController::class, 'excel'
])->name('excel');


Route::get('/informe_completo', [
    PersonaController::class, 'informe_completo'
])->name('informe_completo');

Route::get('/excel_completo', [
    PersonaController::class, 'excel_completo'
])->name('excel_completo');



Route::get('/informe_puesto_vacunacion', [
    PersonaController::class, 'informe_puesto_vacunacion'
])->name('informe_puesto_vacunacion');

Route::get('/excel_puesto_vacunacion', [
    PersonaController::class, 'excel_puesto_vacunacion'
])->name('excel_puesto_vacunacion');


/*
http://127.0.0.1:8000/personas/9122/edit
Route::get('personas/{id}/primera', 'PersonaController@register_primera')->name('register_primera');
Route::get('personas/{id}/primera', 'PersonaController@register_primera')->name('register_primera');
Route::get('personas/{id}/segunda', 'PersonaController@register_primera')->name('register_segunda');
*/

Route::get(
    'personas/{id}/primera',
    [PersonaController::class, 'register_primera']
)->name('register_primera');


Route::post(
    'personas/primera/{persona}',
    [PersonaController::class, 'update_primera']
)->name('update_primera');

Route::get(
    'personas/show_primera/{persona}',
    [PersonaController::class, 'show_primera']
)->name('show_primera');


Route::get(
    'personas/{id}/segunda',
    [PersonaController::class, 'register_segunda']
)->name('register_segunda');


Route::post(
    'personas/segunda/{id}',
    [PersonaController::class, 'update_segunda']
)->name('update_segunda');


Route::get(
    'personas/show_segunda/{persona}',
    [PersonaController::class, 'show_segunda']
)->name('show_segunda');



Route::get('/excel', [
    PersonaController::class, 'reporte'
])->name('excel');


Route::resource('dosis', App\Http\Controllers\DosisController::class);


Route::get(
    '/cedula/{cedula}',
    [PersonaController::class, 'cedula']
)->name('cedula');


Route::get(
    '/check', 
    [DosisController::class, 'check']
)->name('check');