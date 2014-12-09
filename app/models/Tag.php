<?php

class Tag extends \Eloquent {
	protected $fillable = [];
        protected $guarded = array();
        public function blogposts() {
		return $this->belongsToMany('Blogpost');
	}
}