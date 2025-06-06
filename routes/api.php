<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AutorController;
use App\Http\Controllers\GeneroController;
use App\Http\Controllers\LivroController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\UsuarioController;

/*Route::get('/usuario', function (Request $request) {
    return $request->usuario();
})->middleware('auth:sanctum');
*/
Route::controller(AutorController::class)->group(function () {
    Route::get('/autor', 'get'); // Listar
    Route::get('/autor/getAutoresComLivros/{id}', 'getAutoresComLivros'); // Listar
    Route::get('/autor/getgetLivrosByAutor', 'getLivrosByAutor'); // Listar
    Route::get('/autor/{id}', 'details'); // Buscar por ID
    Route::post('/autor', 'store'); // Criar
    Route::patch('/autor/{id}', 'update'); // Atualizar
    Route::delete('/autor/{id}', 'delete'); // Deletar
});

Route::controller(GeneroController::class)->group(function () {
    Route::get('/genero', 'get'); // Listar
    Route::get('/genero/livrosPorGenero/{id}', 'livrosPorGenero'); // Listar livros por gênero
    Route::get('/genero/generosComLivros', 'generosComLivros'); // Listar gêneros com livros
    Route::get('/genero/{id}', 'details'); // Buscar por ID
    Route::post('/genero', 'store'); // Criar
    Route::patch('/genero/{id}', 'update'); // Atualizar
    Route::delete('/genero/{id}', 'delete'); // Deletar
});

Route::controller(LivroController::class)->group(function () {
    Route::get('/livro', 'get'); // Listar
    Route::get('/livro/getReviews/{id}', 'getReviews'); // Listar reviews de um livro
    Route::get('/livro/getWithRelations', 'getWithRelations'); // Listar livros com seus reviews, autor e gênero
    Route::get('/livro/{id}', 'details'); // Buscar por ID
    Route::post('/livro', 'store'); // Criar
    Route::patch('/livro/{id}', 'update'); // Atualizar
    Route::delete('/livro/{id}', 'delete'); // Deletar
});

Route::controller(ReviewController::class)->group(function () {
    Route::get('/review', 'get'); // Listar
    Route::get('/review/{id}', 'details'); // Buscar por ID
    Route::post('/review', 'store'); // Criar
    Route::patch('/review/{id}', 'update'); // Atualizar
    Route::delete('/review/{id}', 'delete'); // Deletar
});

Route::controller(UsuarioController::class)->group(function () {
    Route::get('/usuario', 'get'); // Listar
    Route::get('/usuario/getReviews/{usuarioId}', 'getReviews'); // Listar reviews de um usuário
    Route::get('/usuario/{id}', 'details'); // Buscar por ID
    Route::post('/usuario', 'store'); // Criar
    Route::patch('/usuario/{id}', 'update'); // Atualizar
    Route::delete('/usuario/{id}', 'delete'); // Deletar
});