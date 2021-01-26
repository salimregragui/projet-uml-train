<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trajet extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function train() {
        return $this->hasOne(Train::class, 'id', 'train_id');
    }

    public function gareDepart() {
        return $this->hasOne(Gare::class, 'id', 'gare_depart');
    }

    public function gareArrivee() {
        return $this->hasOne(Gare::class, 'id', 'gare_arrivee');
    }

    public function correspondances() {
        return $this->hasMany(Correspondance::class, 'idTrajet', 'id');
    }
}
