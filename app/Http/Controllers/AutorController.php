<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\AutorService;
use App\Http\Requests\AutorStoreRequest;
use App\Http\Requests\AutorUpdateRequest;
use App\Http\Resources\AutorResource;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class AutorController extends Controller
{
    private AutorService $autorService;

    public function __construct(AutorService $autorService)
    {
        $this->autorService = $autorService;
    }

    public function get()
    {
        $autores = $this->autorService->get();
        return AutorResource::collection($autores);
    }

    public function details(int $id)
    {
        try {
            $autor = $this->autorService->details($id);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Autor não encontrado'], 404);
        }
        return new AutorResource($autor);
    }

    public function store(AutorStoreRequest $request)
    {
        $data = $request->validated();
        $autor = $this->autorService->store($data);
        return response()->json($autor);
    }

    public function update(int $id, AutorUpdateRequest $request)
    {
        $data = $request->validated();
        try {
            $autor = $this->autorService->update($id, $data);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Autor não encontrado'], 404);
        }
        return new AutorResource($autor);
    }

    public function delete(int $id)
    {
        try {
            $autor = $this->autorService->delete($id);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Autor não encontrado'], 404);
        }
        return response()->json(['message' => 'Autor deletado com sucesso']);
    }

    public function getAutoresComLivros(int $id)
    {
        $autores = $this->autorService->getAutoresComLivros($id);
        return new AutorResource($autores);
    }
    public function getLivrosByAutor()
    {
        try {
            $livros = $this->autorService->getLivrosByAutor();
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Autor não encontrado'], 404);
        }
        return response()->json($livros);
    }

}
