<?php

namespace App\Models;

use App\Models\Ville;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pays extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'libelle',
        'code',
        'slug',
        
        'created_at',
        'updated_at',
    ];

    public function ville()
    {
        return $this->hasMany(Ville::class , 'pays_id')->get();
    }

    public function delete()
    {
       DB::transaction(function(){
            $this->ville()->delete();
            parent::delete();
       });
    }
}
