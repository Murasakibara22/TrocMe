<?php

namespace App\Models;

use App\Models\SousCategorie;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class EspacePub extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'titre',
        'description',
        'photo',
        'slug',
        'souscat_id'
     ];

     public function souscategorie() {
        return $this->belongsTo(SousCategorie::class,'souscat_id');
    }
}
