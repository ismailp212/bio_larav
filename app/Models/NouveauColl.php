<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NouveauColl extends Model
{
    
        protected $table = 'collections';
        protected $primaryKey = 'id';
        public $timestamps = false;
    
        protected $fillable = [
            'name',
            'description',
            'actual_price',
            'old_price',
            'photo',
            'created_at',
            'updated_at'
        ];
}
