<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producte extends Model
{
    use HasFactory;

    protected $fillable = [
        'NomProducte',
        'Descripcio',
        'Preu',
        'Icona',
        'CategoriaID',
        'BotigaID',
        'DataCreacio',
        'Estoc',
        'Estat',
    ];

    public function botiga()
    {
        return $this->belongsTo(Botiga::class, 'BotigaID');
    }

    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'CategoriaID');
    }

    public function ressenyes()
    {
        return $this->hasMany(Ressenya::class, 'ProducteID');
    }

}
