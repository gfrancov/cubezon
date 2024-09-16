<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetallComanda extends Model
{
    use HasFactory;

    protected $fillable = [
        'ComandaID',
        'ProducteID',
        'Quantitat',
        'PreuUnitari',
    ];

    public function comanda()
    {
        return $this->belongsTo(Comanda::class, 'ComandaID');
    }

    public function producte()
    {
        return $this->belongsTo(Producte::class, 'ProducteID');
    }

}
