<?php

class Address extends Eloquent
{
    
    protected $table = 'address';
    
    public function addressable() {
        return $this->morphTo();
    }
    public function user()
    {
        return $this->belongsTo('User');
    }
    public function company()
    {
        return $this->belongsTo('Company');
    }
    public function shop()
    {
        return $this->belongsTo('Shop');
    }
    public function country()
    {
        return $this->belongsTo('Country');
    }
}