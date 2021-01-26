<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gare extends Model
{
    use HasFactory;

    protected $fillable = [ 'nom', 'ville' ];

    public function trajets() {
        return $this->belongsToMany(Trajet::class);
    }
}
