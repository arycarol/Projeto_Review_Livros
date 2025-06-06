<?php
namespace App\Repositories;
use App\Models\Usuario;

class UsuarioRepository
{
    public function get(){
        return Usuario::all();
    }

    public function details(int $id)
    {
        return Usuario::findOrFail($id);
    }

    public function store(array $data)
    {
        return Usuario::create($data);
    }

    public function update(int $id, array $data)
    {
        $usuario = $this->details($id);
        $usuario->update($data);
        return $usuario;
    }

    public function delete(int $id)
    {
        $usuario = $this->details($id);
        $usuario->delete();
        return $usuario;
    }

    //Listar review de um usuário
    public function getReviews(int $usuarioId)
    {
        $usuario = $this->details($usuarioId);
        return $usuario->review;
    }
}