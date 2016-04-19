<?php

namespace Milax\Mconsole\Sliders\Models;

use Illuminate\Database\Eloquent\Model;
use Request;

class Slider extends Model
{
    use \HasTags;
    
    protected $fillable = ['preset_id', 'slug', 'title', 'description', 'duration', 'concurrent', 'shuffle', 'enabled'];
    
    /**
     * Automatically generate slug from heading if empty, format for url
     * 
     * @param void
     */
    public function setSlugAttribute($value)
    {    
        if (strlen($value) == 0) {
            $title = Request::input('title');
            $this->attributes['slug'] = str_slug($title);
        } else {
            $this->attributes['slug'] = str_slug($value);
        }
    }
}
