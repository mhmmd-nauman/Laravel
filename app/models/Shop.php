<?php

class Shop extends Eloquent
{
    
    public function uesrs() {
		return $this->belongsToMany('User',"users_shops","user_id","shop_id");
    }
    public function addresses() {
	return $this->morphMany('Address', 'addressable');
    }
    public function companies() {
          return $this->belongsTo('Company');
    }
    
}