<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
    protected $fillable = ['BankName', 'BankCode'];

    public function states()
    {
        return $this->hasMany(State::class, 'bank_id', 'id');
    }

    public function cities()
    {
        return $this->hasMany(City::class, 'bank_id', 'id');
    }

    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id', 'id');
    }
}
