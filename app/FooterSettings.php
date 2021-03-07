<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FooterSettings extends Model
{
    protected $fillable = ['address','phone','copy_right','follow_with_us','left_paragraph'];
}
