<?php
/**
 * Created by PhpStorm.
 * User: Bilal Mahoon
 * Date: 28/11/2017
 * Time: 18:46
 */

namespace App\Traits;

trait FormatDates
{
    protected $newDateFormat = 'M d, Y';


    // convert the UTC format to my format
    public function getCreatedAtAttribute($date)
    {
        return \Carbon\Carbon::parse($date)->diffForHumans();
    }


    public function getCreatedAtBeforeAttribute($date)
    {
        return \Carbon\Carbon::parse($date)->format($this->newDateFormat);
    }

    // convert the UTC format to my format
    public function getUpdatedAtAttribute($date)
    {
        return \Carbon\Carbon::parse($date)->format($this->newDateFormat);
    }

    // convert the UTC format to my format
    public function getDeletedAtAttribute($date)
    {
        return \Carbon\Carbon::parse($date)->format($this->newDateFormat);
    }

    // convert the UTC format to my format
    public function getStartingDateAttribute($date)
    {
        return \Carbon\Carbon::parse($date)->format($this->newDateFormat);
    }

    // convert the UTC format to my format
    public function getEndingDateAttribute($date)
    {
        return \Carbon\Carbon::parse($date)->format($this->newDateFormat);
    }

    public function getCreatedDateAttribute()
    {
        return \Carbon\Carbon::parse($this->attributes['created_at'])->format($this->newDateFormat);
    }
}
