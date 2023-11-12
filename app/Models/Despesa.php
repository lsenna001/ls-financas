<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Despesa extends Model
{
    use HasFactory;

    protected $table = 'despesas';

    public $timestamps = false;

    protected $primaryKey = 'id_despesa';

    protected $fillable = [
        'user_id', 'descricao', 'valor', 'dia_vencimento', 'categoria_id'
    ];

    public function categoria(): HasOne
    {
        return $this->hasOne(Categoria::class, 'id_categoria', 'categoria_id');
    }

    /**
     * Traz todas as despesas do usuário que está próxima do vencimento
     * @param int $user_id
     * @param int $day
     * @return array
     */
    public static function aboutExpire(int $user_id, int $day): array
    {
        return self::where('user_id', '=', $user_id)->where('dia_vencimento', '>', $day)->get()->toArray();
    }
}
