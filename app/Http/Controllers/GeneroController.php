<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\GeneroService;
use App\Http\Requests\GeneroStoreRequest;
use App\Http\Requests\GeneroUpdateRequest;
use App\Http\Resources\GeneroResource;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class GeneroController extends Controller
{
    private GeneroService $generoService;

    public function __construct(GeneroService $generoService)
    {
        $this->generoService = $generoService;
    }

    public function get()
    {
        $generos = $this->generoService->get();
        return GeneroResource::collection($generos);
    }

    public function details(int $id)
    {
        try {
            $genero = $this->generoService->details($id);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Gênero não encontrado'], 404);
        }
        return new GeneroResource($genero);
    }

    public function store(GeneroStoreRequest $request)
    {
        $data = $request->validated();
        $genero = $this->generoService->store($data);
        return new GeneroResource($genero);
    }

    public function update(int $id, GeneroUpdateRequest $request)
    {
        $data = $request->validated();
        try {
            $genero = $this->generoService->update($id, $data);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Gênero não encontrado'], 404);
        }
        return new GeneroResource($genero);
    }

    public function delete(int $id)
    {
        try {
            $this->generoService->delete($id);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Gênero não encontrado'], 404);
        }
        return response()->json(['message' => 'Gênero deletado com sucesso']);
    }

    public function livrosPorGenero(int $id)
    {
        try {
            $livros = $this->generoService->livrosPorGenero($id);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Gênero não encontrado'], 404);
        }
        return response()->json($livros);
    }
    public function generosComLivros()
    {
        $generos = $this->generoService->generosComLivros();
        return GeneroResource::collection($generos);
    }
}
