<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $fillable = [
        'NomItem',
        'Descripcio',
    ];

    public function productes()
    {
        return $this->hasMany(Producte::class, 'ItemID');
    }

}
