<?php

namespace App\Models;
use App\Http\Models\Livre;

use Illuminate\Database\Eloquent\Model;

class Autheur extends Model
{
    protected $table = 'autheurs';
    protected $fillable = ['nom', 'prenom'];

    public function livres()
    {
        return $this->hasMany(Livre::class);
    }

}
