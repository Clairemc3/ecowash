<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    protected $guarded = [];


    protected $table = 'content';
    //


    /**
     * Defines the path for this model
     *
     * @return string
     */
    public function path()
    {
        return "/admin/content/{$this->id}";
    }
}
