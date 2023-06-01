<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function details()
    {
        return $this->belongsToMany(DetailEvent::class, 'detail_events', 'id_event');
    }

    public function detailProperty()
    {
        return $this->belongsToMany(Property::class, 'detail_events', 'id_event', 'id_property');
    }


    public function detailTeam(){
        return $this->belongsToMany(Team::class, 'detail_events', 'id_event', 'id_team');
    }

    public function properties()
    {
        return $this->belongsToMany(Property::class, 'detail_events', 'id_event', 'id_property');
    }

    public function teams()
    {
        return $this->belongsToMany(Team::class, 'detail_events', 'id_event', 'id_team');
    }
    


}
