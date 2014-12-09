<?php

class Company extends Eloquent
{
    protected $table = 'company';
    public function addresses() {
	return $this->morphMany('Address', 'addressable');
    }
    public function shops() {
		return $this->hasMany('Shop');
    }
    public function uesrs() {
		return $this->belongsToMany('User',"users_companies","user_id","company_id");
    }
    
}