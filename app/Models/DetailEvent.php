<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailEvent extends Model
{
    use HasFactory;

    public function property()
    {
        return $this->belongsTo(Property::class, 'id_property');
    }

    public function team()
    {
        return $this->belongsTo(Team::class, 'id_team');
    }
}
