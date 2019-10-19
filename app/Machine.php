<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Machine extends Model
{
    protected $guarded = [];



    /**
     * FDefines the path for this model
     *
     * @return string
     */
    public function path()
    {
        return "/machines/{$this->id}";
    }
}
