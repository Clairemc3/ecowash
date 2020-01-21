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
     * Return status of alert
     *
     * @return void
     */
    public function getStatusAttribute()
    {
        if ($this->isActive())
        {
            return 'active';
        }
        // If complete

        if ($this->isComplete())
        {
            return 'expired';
        }
        return 'inactive';
    }

    /**
     * Convert this to a table
     *
     * @return void
     */
    public function getStatusOrderAttribute()
    {
        if ($this->isActive())
        {
            return 1;
        }

        // If expired
        if ($this->isExpired())
        {
            return 3;
        }
        return 2;
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


    /**
     * Determine if the alert is expired (in the past)
     *
     * @return boolean
     */
    public function isExpired() :bool
    {
        $now = now();

        if ($now->isAfter($this->end_date->endOfDay()))
        {
            return true;
        }

        return false;
    }


    /**
     * Determine if the alert is active
     *
     * @return boolean
     */
    public function isActive() :bool
    {
        $now = now();

        if ($now->between($this->start_date->startOfDay(),
            $this->end_date->endOfDay()))
        {
            return true;
        }

        return false;
    }

    /**
     * Return any alerts which are set to run between these dates
     */
    public function scopeInDateRange($query, $startDate, $endDate)
    {
        return  $query->whereDate('end_date', '>=', $startDate)
        ->whereDate('start_date', '<=', $endDate );
    }

    /**
     * Return any alerts which are active now
     */
    public function scopeActive($query)
    {
        $now = now();

        return  $query->whereDate('end_date', '>=', $now)
        ->whereDate('start_date', '<=', $now );
    }


}
