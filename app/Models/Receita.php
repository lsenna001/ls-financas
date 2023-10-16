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
}
