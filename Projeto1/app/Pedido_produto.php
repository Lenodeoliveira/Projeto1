<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pedido_produto extends Model
{
 
 public function pedido_produtos()
    {
        return $this->hasMany('App\PedidoProduto')
            ->select( \DB::raw('produto_id, sum(preco) as precos, count(1) as qtd') )
            ->groupBy('produto_id')
            ->orderBy('produto_id', 'desc');
    }

    public function pedido_produtos_itens()
    {
        return $this->hasMany('App\PedidoProduto');
    }

    public static function consultaId($where)
    {
        $pedido = self::where($where)->first(['id']);
        return !empty($pedido->id) ? $pedido->id : null;
    }
    
}
