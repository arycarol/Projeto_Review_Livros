<?php

namespace App\Http\Controllers;

use App\Models\Livro;
use Illuminate\Http\Request;
use App\Services\LivroService;
use App\Http\Requests\LivroStoreRequest;
use App\Http\Requests\LivroUpdateRequest;
use App\Http\Resources\LivroResource;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class LivroController extends Controller
{
    private LivroService $livroService;

    public function __construct(LivroService $livroService)
    {
        $this->livroService = $livroService;
    }

    public function get()
    {
        $livros = $this->livroService->get();
        return LivroResource::collection($livros);
    }

    public function details(int $id)
    {
        try {
            $livro = $this->livroService->details($id);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Livro não encontrado'], 404);
        }
        return new LivroResource($livro);
    }

    public function store(LivroStoreRequest $request)
    {
        $data = $request->validated();
        $livro = $this->livroService->store($data);
        return new LivroResource($livro);
    }

    public function update(int $id, LivroUpdateRequest $request)
    {
        $data = $request->validated();
        try {
            $livro = $this->livroService->update($id, $data);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Livro não encontrado'], 404);
        }
        return new LivroResource($livro);
    }

    public function delete(int $id)
    {
        try {
            $this->livroService->delete($id);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Livro não encontrado'], 404);
        }
        return response()->json(['message' => 'Livro deletado com sucesso']);
    }
    public function getReviews(int $id)
    {
        try {
            $reviews = $this->livroService->getReviews($id);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Livro não encontrado'], 404);
        }
        return response()->json($reviews);
    }
    public function getWithRelations()
    {
        $livros = Livro::with(['autor', 'genero', 'review'])->get();

        return response()->json(['data' => $livros]);
    }
}
