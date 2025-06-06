<?php

namespace App\Services;

use App\Repositories\LivroRepository;
use App\Models\Livro;

class LivroService
{
    private LivroRepository $livroRepository;

    public function __construct(LivroRepository $livroRepository)
    {
        $this->livroRepository = $livroRepository;
    }

    /**
     * Retorna todos os livros.
     */
    public function get()
    {
        return $this->livroRepository->get();
    }

    /**
     * Retorna detalhes de um livro específico.
     */
    public function details(int $id)
    {
        return $this->livroRepository->details($id);
    }

    /**
     * Cria um novo livro.
     */
    public function store(array $data)
    {
        return $this->livroRepository->store($data);
    }

    /**
     * Atualiza um livro existente.
     */
    public function update(int $id, array $data)
    {
        return $this->livroRepository->update($id, $data);
    }

    /**
     * Remove um livro.
     */
    public function delete(int $id)
    {
        return $this->livroRepository->delete($id);
    }

    /**
     * Lista reviews de um livro.
     */
    public function getReviews(int $id)
    {
        return Livro::with('review')->find($id);
    }

    /**
     * Lista livros com seus reviews, autor e gênero.
     */
    public function getWithRelations()
    {
        return Livro::with(['review', 'autor', 'genero'])->get();
    }
}