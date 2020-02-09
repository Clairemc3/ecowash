<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    protected $guarded = [];

    /**
     * Defines the path for this model
     *
     * @return string
     */
    public function path()
    {
        return "/admin/sliders/{$this->id}";
    }


    /**
     * Return a string version of the  resource
     *
     */
    public function getModelNameAttribute()
    {
        return 'slider';
    }
}
