<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Correspondance extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $table = 'correspondance';

    public function train() {
        return $this->hasOne(Train::class, 'id', 'train');
    }

    public function gareDepart() {
        return $this->hasOne(Gare::class, 'id', 'gare_depart');
    }

    public function gareArrivee() {
        return $this->hasOne(Gare::class, 'id', 'gare_arrivee');
    }

    public function garePrecedente() {
        return $this->hasOne(Gare::class, 'id', 'gare_precedente');
    }

    public function trajet() {
        return $this->belongsTo(Trajet::class, 'id', 'idTrajet');
    }
}
