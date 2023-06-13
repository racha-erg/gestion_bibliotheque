<?php

namespace App\Models;
use App\Models\Autheur;
use App\Models\Emprunt;
use Illuminate\Database\Eloquent\Model;

use App\Events\BookModified;

class Livre extends Model
{
    protected $table = 'livres';
    protected $fillable = ['titre', 'annee_publication', 'nb_pages', 'auteur_id'];



    public function autheur()
    {
        return $this->belongsTo(Autheur::class, 'auteur_id');
    }
    


    public function emprunts()
    {
        return $this->hasMany(Emprunt::class);
    }

    protected static function boot()
    {
        parent::boot();

        static::updated(function ($livre) {
            event(new BookModified($livre));
        });
    }
}
