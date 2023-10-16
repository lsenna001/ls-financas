<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Categoria extends Model
{
    use HasFactory;
    
    protected $table = 'categorias';

    protected $primaryKey = 'id_categoria';

    public $timestamps = false;

    protected $fillable = [
        'nome_categoria'
    ];

    /**
     * Relacionamento de categorias com despesas
     */
    public function despesas(): BelongsTo
    {
        return $this->belongsTo(Despesa::class, 'categoria_id', 'id_categoria');
    }
}
