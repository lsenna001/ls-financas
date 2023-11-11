<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Receita extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = 'receitas';

    protected $primaryKey = 'id_receita';

    protected $fillable = [
        'empresa', 'valor', 'user_id'
    ];

    /**
     * Todas as receitas do usuário
     * @param int $user_id Id do Usuário
     * @return array
     */
    public static function getReceitas(int $user_id): array
    {
        return self::where('user_id', '=', $user_id)->get()->toArray();
    }

    /**
     * Soma o total de receitas do usuário informado
     * @param int $user_id Id do Usuário
     * @return float
     */
    public static function getSumReceitas(int $user_id): float
    {
        return array_sum(
            array_column(self::where('user_id', '=', $user_id)->get()->toArray(), 'valor')
        );
    }


}
