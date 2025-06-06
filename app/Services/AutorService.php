<?php

namespace App\Services;

use App\Repositories\AutorRepository;

class AutorService
{
    private AutorRepository $autorRepository;

    public function __construct(AutorRepository $autorRepository)
    {
        $this->autorRepository = $autorRepository;
    }

    /**
     * Retorna todos os autores.
     */
    public function get()
    {
        return $this->autorRepository->get();
    }

    /**
     * Retorna detalhes de um autor específico.
     */
    public function details(int $id) 
    {
         return $this->autorRepository->getAutoresComLivros($id);
    }
    

    /**
     * Cria um novo autor.
     */
    public function store(array $data)
    {
        return $this->autorRepository->store($data);
    }

    /**
     * Atualiza um autor existente.
     */
    public function update(int $id, array $data)
    {
        return $this->autorRepository->update($id, $data);
    }

    /**
     * Remove um autor.
     */
    public function delete(int $id)
    {
        return $this->autorRepository->delete($id);
    }

    /**
     * Lista todos os autores com seus livros.
     */
    public function getAutoresComLivros(int $id)
    {
        return $this->autorRepository->getAutoresComLivros($id);
    }

    /**
     * Lista todos os livros de um autor específico.
     */
    public function getLivrosByAutor()
    {
        return $this->autorRepository->getLivrosByAutor();
    }
    
}