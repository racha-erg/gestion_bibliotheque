<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookHistory extends Model
{
    protected $table = 'book_histories';
    
    protected $fillable = ['livre_id', 'action', 'details'];

    
}
