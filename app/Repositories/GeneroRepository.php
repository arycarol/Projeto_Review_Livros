<?php
namespace App\Repositories;
use App\Models\Genero;

class GeneroRepository
{
    public function get(){
        return Genero::all();
    }

    public function details(int $id)
    {
        return Genero::findOrFail($id);
    }

    public function store(array $data)
    {
        return Genero::create($data);
    }

    public function update(int $id, array $data)
    {
        $genero = $this->details($id);
        $genero->update($data);
        return $genero;
    }

    public function delete(int $id)
    {
        $genero = $this->details($id);
        $genero->delete();
        return $genero;
    }

    //Listar todos os livros de um gênero
    public function PorGenero(int $id)
    {
        return Genero::with('livro')->find($id);
    }

    //Listar todos os gêneros com seus livros
    public function generosComlivro()
    {
        return Genero::with('livro')->get();
    }
}