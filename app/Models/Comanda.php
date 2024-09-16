<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comanda extends Model
{
    use HasFactory;

    protected $fillable = [
        'NomUsuari',
        'DataComanda',
        'EstatComanda',
        'Total',
    ];

    public function detalls()
    {
        return $this->hasMany(DetallComanda::class, 'ComandaID');
    }

}
