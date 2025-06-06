<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Livro extends Model
{
    protected $table = 'livro';
    protected $fillable = ['id', 'titulo', 'sinopse','autor_id','genero_id'];

    public function autor()
    {
        return $this->belongsTo(Autor::class, 'autor_id', 'id');
    }
    public function genero()
    {
        return $this->belongsTo(Genero::class, 'genero_id', 'id');
    }
    public function review()
    {
        return $this->hasMany(Review::class, 'livro_id', 'id');
    }
}
