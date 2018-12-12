<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produtos extends Model
{
protected $fillable = [
        
        'sku',
        'titulo',
        'descricao',
        'preco',
        
    ];
}
