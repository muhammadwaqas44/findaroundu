<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FooterLinks extends Model
{
    protected $fillable = ['facebook_url','gmail_url','twitter_url','linkedin_url','youtube_url','whats_app','is_active'];
}
