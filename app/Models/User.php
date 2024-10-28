<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable
{
    use Notifiable;

    // Spécifier les colonnes autorisées pour l'assignation de masse
    protected $fillable = [
        'prenom', 'nom', 'courriel', 'mot_de_passe',
    ];

    // Masquer le mot de passe et le remember_token dans les résultats des requêtes
    protected $hidden = [
        'mot_de_passe', 'remember_token',
    ];

    // Redéfinir la méthode pour récupérer le mot de passe lors de l'authentification
    public function getAuthPassword()
    {
        return $this->mot_de_passe; 
    }
}
