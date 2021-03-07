<?php

namespace App;

use App\Providers\UserCreation;
use App\Scopes\ActiveScope;
use Illuminate\Notifications\Notifiable;
use App\Traits\FormatDates;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable,FormatDates;

    protected static function boot()
    {
        parent::boot();
        static::addGlobalScope(new ActiveScope());
    }


    function createdBy()
    {
        return $this->belongsto('App\User','created_by');
    }

    public function getProfileImageAttribute($profile_image)
    {

        if ($profile_image != null) {
            return asset($profile_image);
        } else {
            return asset('main-admin/images/default.png');
        }

    }

    public function scopeNotAdmin($query)
    {
        return $query->whereNotIn('role_id', Role::where('name', 'admin')->pluck('id')->all());
    }

    public function scopeAgent($query)
    {
        return $query->whereNotIn('role_id', Role::where('name', 'agent')->pluck('id')->all());
    }


    public function scopeOnlyAgent($query)
    {
        return $query->whereIn('role_id', Role::where('name', 'agent')->pluck('id')->all());
    }




    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','phone','role_id','is_active','country_id','created_by','email_verified_at'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */


    public function country()
    {
        return $this->belongsTo('App\MainCountry', 'country_id');
    }


    public function myUsers()
    {
        return $this->hasMany('App\User', 'created_by')->withoutGlobalScope(ActiveScope::class)->NotAdmin();
    }


    public function userInfo()
    {
        return $this->hasOne('App\UserInfo', 'user_id');
    }

    public function subscriptions()
    {
        return $this->hasMany('App\Subscription\Subscription', 'user_id');
    }

    public function services()
    {
        return $this->hasMany('App\Service', 'created_by');
    }

    public function jobs()
    {
        return $this->hasMany('App\FauJob', 'created_by');
    }

    public function agentAdminBusinesses()
    {
        return $this->hasMany('App\Business', 'agent_admin_id')->withoutGlobalScope(ActiveScope::class)->withoutGlobalScope(IsApproveScope::class);
    }

    public function agentAdminServices()
    {
        return $this->hasMany('App\Service', 'agent_admin_id')->withoutGlobalScope(ActiveScope::class)->withoutGlobalScope(IsApproveScope::class);
    }

    public function agentAdminAdds()
    {
        return $this->hasMany('App\Add', 'agent_admin_id')->withoutGlobalScope(ActiveScope::class)->withoutGlobalScope(IsApproveScope::class);
    }

    public function businesses()
    {
        return $this->hasMany('App\Business', 'created_by');
    }


    public function adds()
    {
        return $this->hasMany('App\Add', 'created_by');
    }




    public function address()
    {
        return $this->hasOne('App\Address', 'user_id');
    }

    public function role()
    {
        return $this->belongsTo('App\Role', 'role_id');
    }

    protected $dates = [
        'created_at',
        'updated_at'
    ];
    protected $hidden = [
        'password', 'remember_token',
    ];




    protected $dispatchesEvents = [
        'created' => UserCreation::class,

    ];

}
