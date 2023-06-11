<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NouveauProduit extends Model
{
    protected $table = 'nouveau_produit';
    protected $primaryKey = 'id_prod';
    public $timestamps = false;

    protected $fillable = [
        'id_prod',
        'titre',
        'description',
        'category',
        'old_price',
        'actual_price',
        'image',
    ];
}
