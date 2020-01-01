<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Alert extends Model
{

    protected $guarded = [];

    /**
     * Defines the path for this model
     *
     * @return string
     */
    public function path()
    {
        return "/admin/alerts/{$this->id}";
    }
}
