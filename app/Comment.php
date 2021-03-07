<?php

namespace App;

use App\Traits\FormatDates;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use FormatDates;
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo('App\User')->withoutGlobalScope(ActiveScope::class);
    }

    public function likes(){
        return $this->hasMany('App\Like')->withoutGlobalScope(ActiveScope::class);
    }

    public function replies()
    {
        return $this->hasMany('App\Reply')->withoutGlobalScope(ActiveScope::class);
    }

}
