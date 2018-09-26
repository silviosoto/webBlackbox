<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class motocicleta extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id','placa','cilindrada', 'color', 'user_id',
    ];
    
    protected $table = "motos";
}
