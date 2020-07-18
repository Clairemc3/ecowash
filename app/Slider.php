<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use LengthException;

class Slider extends Model
{
    protected $guarded = [];

    /**
     * Defines the path for this model.
     *
     * @return string
     */
    public function path()
    {
        return "/admin/sliders/{$this->id}";
    }

    /**
     * Return a string version of the  resource.
     */
    public function getModelNameAttribute()
    {
        return 'slider';
    }

    /**
     * Return a string version of the  resource.
     */
    public function getTruncatedTextAttribute()
    {
        if ($this->text && strlen($this->text) > 50)
        {
            return substr($this->text, 0, 50) . '...';
        }
        return $this->text;
    }
}
