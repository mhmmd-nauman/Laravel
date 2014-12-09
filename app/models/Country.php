<?php

class Country extends Eloquent
{
    
    public function addresses() {
	return $this->morphMany('Address', 'addressable');
    }
}