<?php

namespace App\Services;

use App\Repositories\UsuarioRepository;

class UsuarioService
{
    private UsuarioRepository $usuarioRepository;

    public function __construct(UsuarioRepository $usuarioRepository)
    {
        $this->usuarioRepository = $usuarioRepository;
    }

    /**
     * Retorna todos os usuários.
     */
    public function get()
    {
        return $this->usuarioRepository->get();
    }

    /**
     * Retorna detalhes de um usuário específico.
     */
    public function details(int $id)
    {
        return $this->usuarioRepository->details($id);
    }

    /**
     * Cria um novo usuário.
     */
    public function store(array $data)
    {
        return $this->usuarioRepository->store($data);
    }

    /**
     * Atualiza um usuário existente.
     */
    public function update(int $id, array $data)
    {
        return $this->usuarioRepository->update($id, $data);
    }

    /**
     * Remove um usuário.
     */
    public function delete(int $id)
    {
        return $this->usuarioRepository->delete($id);
    }

    /**
     * Lista as reviews de um usuário.
     */
    public function getReviews(int $usuarioId)
    {
        return $this->usuarioRepository->getReviews($usuarioId);
    }
}