<?php

namespace App\Models;

use App\Models\Annonces;
use App\Models\Categorie;
use App\Models\EspacePub;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SousCategorie extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'categorie_id',
        'libelle',
        'slug',
        'description',
        'created_at',
        'updated_at',
        'photo'
    ];

    public function categorie() {
        return $this->belongsTo(Categorie::class, 'categorie_id');
    }

    public function annonce() {
        return $this->hasMany(Annonces::class, 'souscategorie_id')->get();
    }

    // public function delete()
    // {
    //    DB::transaction(function(){
    //         $this->annonce()->delete();
    //         parent::delete();
    //    });
    // }

    public function espace_pub() {
        return $this->hasMany(EspacePub::class ,'souscat_id')->get();
    }
}
