<?php

namespace App\Models;

use App\Models\Annonces;
use App\Models\Abonnement;
use App\Models\ProfessionalUser;
use Laravel\Sanctum\HasApiTokens;

use Illuminate\Support\Facades\DB;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Contracts\Auth\CanResetPassword;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'nom',
        'prenom',
        'contact',
        'email',
        'photo',
        'photo_entreprise',
        'bannear',
        'slug',
        'souscrit',
        'view_count_page',
        'role',
        'is_online',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    
    public function annonces() {
        return $this->hasMany(Annonces::class, 'user_id');
    }

    public function abonnement() {
        return $this->hasMany(Abonnement::class, 'user_id');
    }
    
    public function professional_user(){
        return $this->hasMany(ProfessionalUser::class);
    }

    public function delete()
    {
       DB::transaction(function(){
            $this->annonces()->delete();
            parent::delete();
       });
    }
}
