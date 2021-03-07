<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FauTag extends Model
{
    protected $guarded = [];

    public function categories()
    {
        return $this->belongsToMany(Category::Class, 'pivot_cate_tags', 'fau_tag_id', 'category_id');
    }

}
