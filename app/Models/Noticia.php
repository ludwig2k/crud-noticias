<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Noticia extends Model
{
    use HasFactory;

    protected $fillable = [
        'titulo',
        'descricao',
        'imagem',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
