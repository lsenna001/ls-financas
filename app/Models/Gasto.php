<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Gasto extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = 'gastos';

    protected $primaryKey = 'id_gasto';

    protected $fillable = [
        'descricao', 'data', 'valor', 'categoria_id', 'user_id'
    ];

    /**
     * Relacionamento com Categoria
     *
     * @return HasOne
     */
    public function categoria(): HasOne
    {
        return $this->hasOne('App\Models\Categoria', 'id_categoria', 'categoria_id');
    }

    /**
     * Todos os gastos do usuário
     * @param int $user_id Id do Usuário
     * @return array
     */
    public static function getGastos(int $user_id): array
    {
        $gastos = self::where('user_id', '=', $user_id)->join('categorias', 'id_categoria', '=', 'categoria_id')->get()->toArray();
        foreach ($gastos as &$g){
            $g['data'] = Carbon::createFromFormat('Y-m-d', $g['data'])->format('d/m/Y');
        }
        return $gastos;
    }

    /**
     * Todos os gastos do mês informado
     * @param int $month
     * @return array
     */
    public static function byMonth(int $user_id, int $month): array
    {
        $gastos = self::where('user_id', '=', $user_id)->whereMonth('data', $month)->join('categorias', 'id_categoria', '=', 'categoria_id')->get()->toArray();

        foreach ($gastos as &$g){
            $g['data'] = Carbon::createFromFormat('Y-m-d', $g['data'])->format('d/m/Y');
        }
        return $gastos;
    }

    /**
     * Seleciona todos os gastos do usuário por categoria
     *
     * @return array
     */
    public static function byCategories(int $user_id): array
    {
        $gastos = self::where('user_id', '=', $user_id)->join('categorias', 'id_categoria', '=', 'categoria_id')->get()->toArray();

        return $gastos;
    }

    /**
     * Monta um array com total de despesas por categoria
     *
     * @return void
     */
    public static function byCategoriesPerMonth(int $user_id, int $month)
    {
        $categorias = Categoria::orderBy('nome_categoria')->get()->toArray();

        foreach ($categorias as &$cat){
            $cat['total'] = self::where('user_id', '=', $user_id)->whereMonth('data', $month)->where('categoria_id', '=', $cat['id_categoria'])->sum('valor');
        }

        return $categorias;
    }

    /**
     * Monta um array com total de despesas por categoria
     *
     * @return void
     */
    public static function countByCategoriesPerMonth(int $user_id, int $month)
    {
        $categorias = Categoria::orderBy('nome_categoria')->get()->toArray();

        foreach ($categorias as &$cat){
            $cat['total'] = self::where('user_id', '=', $user_id)->whereMonth('data', $month)->where('categoria_id', '=', $cat['id_categoria'])->get()->count();
        }

        return $categorias;
    }
}
