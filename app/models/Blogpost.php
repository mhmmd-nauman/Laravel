<?php

class Blogpost extends \Eloquent {
	protected $fillable = [];
        protected $guarded = array();
        public function tags() {
		return $this->belongsToMany('Tag');	
	}
}