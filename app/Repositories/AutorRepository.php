<?php
namespace App\Repositories;
use App\Models\Autor;

class AutorRepository
{
    public function get(){
        return Autor::all();
    }

    public function details(int $id)
    {
        return Autor::findOrFail($id);
    }

    public function store(array $data)
    {
        return Autor::create($data);
    }

    public function update(int $id, array $data)
    {
        $autor = $this->details($id);
        $autor->update($data);
        return $autor;
    }

    public function delete(int $id)
    {
        $autor = $this->details($id);
        $autor->delete();
        return $autor;
    }

    // Lista todos os autores com seus livros
    public function getAutoresComLivros(int $id)
    {
        return Autor::with('livro')->find($id);
    }

    // Lista todos os livros de um autor específico
    public function getLivrosByAutor()
    {
        return Autor::with('livro')->get();
    }
}