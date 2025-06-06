<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Review extends Model
{
    protected $table = 'review'; // Por padrão, o nome da tabela deve ser no plural

    protected $fillable = ['livro_id','usuario_id','nota','comentario'];

    public function livro(): BelongsTo
    {
        return $this->belongsTo(Livro::class, 'livro_id');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(Usuario::class, 'usuario_id');
    }
}
