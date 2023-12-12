<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
    */
    protected $fillable = [
        'name',
        'country_id',
        'state_id',
    ];

    /**
     * Define Relationship with Country Model
     *
    */
    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id', 'id');
    }

    /**
     * Define Relationship with State Model
     *
    */
    public function state()
    {
        return $this->belongsTo(State::class, 'state_id', 'id');
    }
}
