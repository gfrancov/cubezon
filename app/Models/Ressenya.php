<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ressenya extends Model
{
    use HasFactory;

    protected $fillable = [
        'ProducteID',
        'AdreçaIP',
        'Nom',
        'Valoracio',
        'Comentari',
        'DataRessenya',
    ];

    public function producte()
    {
        return $this->belongsTo(Producte::class, 'ProducteID');
    }

}
