<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class categoria extends Model
{
    protected $table = 'categoria';
    protected $primarykey = 'idcagoria';

    public $timestamps = false;

    protected $fillable = [
       
       'nome',
       'descricao',
    ];

    protected $guarded[]; 
}
