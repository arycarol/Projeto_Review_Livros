<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $table = 'user';
    protected $fillable = ['id', 'nome', 'email', 'senha'];

    public function review()
    {
        return $this->hasMany(Review::class, 'usuario_id', 'id');
    }
}
