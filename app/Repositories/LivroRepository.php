<?php
namespace App\Repositories;
use App\Models\Livro;

class LivroRepository
{
    public function get(){
        return Livro::all();
    }

    public function details(int $id)
    {
        return Livro::findOrFail($id);
    }

    public function store(array $data)
    {
        return Livro::create($data);
    }

    public function update(int $id, array $data)
    {
        $livro = $this->details($id);
        $livro->update($data);
        return $livro;
    }

    public function delete(int $id)
    {
        $livro = $this->details($id);
        $livro->delete();
        return $livro;
    }
    //Listar reviews de um livro
    public function getReviews(int $id)
    {
        return Livro::with('livro')->find($id);
    }

    // Listar livros com seus reviews, autor e gênero
    public function getWithRelations()
    {
        return Livro::with(['review', 'autor', 'genero'])->get();
    }
}