<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Botiga extends Model
{
    use HasFactory;

    protected $fillable = [
        'NomBotiga',
        'Descripcio',
        'Municipi',
        'Mapa',
        'Logo',
        'Imatge',
        'Prime',
        'PropietariID',
        'DataCreacio',
        'Estat',
    ];

    public function propietari()
    {
        return $this->belongsTo(User::class, 'PropietariID');
    }

    public function productes()
    {
        return $this->hasMany(Producte::class, 'BotigaID');
    }


}
