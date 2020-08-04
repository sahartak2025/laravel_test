<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    public $timestamps = false;
    protected $fillable = ['name', 'surname', 'email', 'event_id'];
    protected $with = ['event'];

    public function event()
    {
        return $this->belongsTo(Event::class);
    }
}
