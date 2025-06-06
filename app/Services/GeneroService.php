<?php

namespace App\Services;

use App\Repositories\GeneroRepository;
use App\Models\Genero;

class GeneroService
{
    private GeneroRepository $generoRepository;

    public function __construct(GeneroRepository $generoRepository)
    {
        $this->generoRepository = $generoRepository;
    }

    /**
     * Retorna todos os gêneros.
     */
    public function get()
    {
        return $this->generoRepository->get();
    }

    /**
     * Retorna detalhes de um gênero específico.
     */
    public function details(int $id)
    {
        return $this->generoRepository->details($id);
    }

    /**
     * Cria um novo gênero.
     */
    public function store(array $data)
    {
        return $this->generoRepository->store($data);
    }

    /**
     * Atualiza um gênero existente.
     */
    public function update(int $id, array $data)
    {
        return $this->generoRepository->update($id, $data);
    }

    /**
     * Remove um gênero.
     */
    public function delete(int $id)
    {
        return $this->generoRepository->delete($id);
    }

    /**
     * Retorna os livros de um gênero específico.
     */
    public function livrosPorGenero(int $generoId)
    {
        $genero = Genero::with('livro')->findOrFail($generoId);
        return $genero->livro;
    }

    /**
     * Lista todos os gêneros com seus livros.
     */
    public function generosComLivros()
    {
        return Genero::with('livro')->get();
    }
}
