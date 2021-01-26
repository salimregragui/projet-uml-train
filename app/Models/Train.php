<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Train extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    protected $fillable = [ 'nom', 'code' ];

    public function trajets() {
        return $this->belongsToMany(Trajet::class, 'trajets', 'gareDepart', 'gareArrivee');
    }
}
