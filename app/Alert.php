<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Alert extends Model
{
    protected $guarded = [];

    protected $dates = ['starts_at', 'ends_at'];

    /**
     * Defines the path for this model.
     *
     * @return string
     */
    public function path()
    {
        return "/admin/alerts/{$this->id}";
    }

    /**
     * Return the start date as a string.
     *
     * @return void
     */
    public function getStartsAtStringAttribute()
    {
        return $this->starts_at->format('d-M-Y, H:i');
    }


    /**
     * Return the end date as a string.
     *
     * @return void
     */
    public function getEndsAtStringAttribute()
    {
        return $this->ends_at->format('d-M-Y, H:i');
    }

    /**
     * Return status of alert.
     *
     * @return void
     */
    public function getStatusAttribute()
    {
        if ($this->isActive()) {
            return 'active';
        }
        // If complete

        if ($this->isComplete()) {
            return 'expired';
        }

        return 'inactive';
    }

    /**
     * Convert this to a table.
     *
     * @return void
     */
    public function getStatusOrderAttribute()
    {
        if ($this->isActive()) {
            return 1;
        }

        // If expired
        if ($this->isExpired()) {
            return 3;
        }

        return 2;
    }


    /**
     * Determine if the alert is expired (in the past).
     *
     * @return bool
     */
    public function isExpired() :bool
    {
        $now = now();

        if ($now->isAfter($this->ends_at)) {
            return true;
        }

        return false;
    }

    /**
     * Determine if the alert is active.
     *
     * @return bool
     */
    public function isActive() :bool
    {
        $now = now();

        if ($now->between($this->starts_at,
            $this->ends_at)) {
            return true;
        }

        return false;
    }

    /**
     * Return any alerts which are set to run between these dates.
     */
    public function scopeInDateRange($query, $startsAt, $endsAt)
    {
        return  $query->where('ends_at', '>=', $startsAt)
        ->where('starts_at', '<=', $endsAt);
    }

    /**
     * Return any alerts which are active now.
     */
    public function scopeActive($query)
    {
        $now = now();

        return  $query->where('ends_at', '>=', $now)
        ->where('starts_at', '<=', $now);
    }
}
