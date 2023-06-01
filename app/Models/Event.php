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
}
