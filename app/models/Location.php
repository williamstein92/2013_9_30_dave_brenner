<?php

// {{{ Location

class Location extends Resource {

	// {{{ properties

    protected $guarded = [];

    public static $rules = [];

    protected $relations_to = [
    	'Activity',
        'Lesson',
        'Receipt',
    ];

    // }}}

    public function activities()
    {
    	return $this->belongsToMany('Activity');
    }

    public function lessons()
    {
        return $this->hasMany('Lesson');
    }

    public function receipts()
    {
        $lessons = $this->lessons()->get();

        $receipts = [];

        foreach($lessons as $lesson) {
            $receipts = array_merge($receipts, $lesson->receipts()->get());
        }

        return $receipts;
    }
}

// }}}
