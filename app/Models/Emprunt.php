<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Emprunt extends Model
{
    protected $table = 'emprunts';
    protected $fillable = ['livre_id', 'date_emprunt', 'date_retour','nom'];

    public function livre()
    {
        return $this->belongsTo(Livre::class);
    }

    

}
