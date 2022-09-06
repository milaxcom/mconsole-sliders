<?php

namespace Milax\Mconsole\Sliders\Models;

use Illuminate\Database\Eloquent\Model;
use Request;
use Str;

class Slider extends Model
{
    use \CascadeDelete, \HasUploads, \HasTags, \HasState;
    
    protected $fillable = ['slug', 'title', 'description', 'duration', 'concurrent', 'shuffle', 'enabled'];
    
    /**
     * Automatically generate slug from heading if empty, format for url
     * 
     * @param void
     */
    public function setSlugAttribute($value)
    {    
        if (strlen($value) == 0) {
            $title = Request::input('title');
            $this->attributes['slug'] = Str::slug($title);
        } else {
            $this->attributes['slug'] = Str::slug($value);
        }
    }
}
