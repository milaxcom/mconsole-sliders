<?php

namespace Milax\Mconsole\Sliders\Http\Requests;

use App\Http\Requests\Request;
use Milax\Mconsole\Sliders\Models\Slider;

class SlidersRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $slider = Sliders::find($this->$slider);
        
        switch ($this->method) {
            case 'PUT':
            case 'UPDATE':
                return [
                    'slug' => 'max:255|unique:galleries,slug,' . $slider->id,
                    'title' => 'required|max:255',
                ];
                break;
            
            default:
                return [
                    'slug' => 'max:255|unique:galleries',
                    'title' => 'required|max:255',
                ];
        }
    }
}
