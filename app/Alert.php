<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Alert extends Model
{

    protected $guarded = [];

    protected $dates = ['start_date', 'end_date'];


    /**
     * Defines the path for this model
     *
     * @return string
     */
    public function path()
    {
        return "/admin/alerts/{$this->id}";
    }


    /**
     * Return the start date as a string
     *
     * @return void
     */
    public function getStartDateStringAttribute()
    {
        return $this->start_date->format('d-M-Y');
    }


    /**
     * Return the end date as a string
     *
     * @return void
     */
    public function getEndDateStringAttribute()
    {
        return $this->end_date->format('d-M-Y');
    }
}
