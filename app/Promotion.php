<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{

    protected $guarded = [];

    /**
     * Defines the path for this model.
     *
     * @return string
     */
    public function path()
    {
        return "/admin/promotions/{$this->id}";
    }

}