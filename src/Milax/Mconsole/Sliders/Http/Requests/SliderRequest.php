<?php

namespace Milax\Mconsole\Sliders\Http\Requests;

use App\Http\Requests\Request;
use Milax\Mconsole\Sliders\Models\Slider;

class SliderRequest extends Request
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
        $slider = Slider::find($this->slider);
        
        switch ($this->method) {
            case 'PUT':
            case 'UPDATE':
                return [
                    'title' => 'required|max:255',
                ];
                break;
            
            default:
                return [
                    'title' => 'required|max:255',
                ];
        }
    }
    
    /**
     * Set custom validator attribute names
     *
     * @return Validator
     */
    protected function getValidatorInstance()
    {
        $validator = parent::getValidatorInstance();
        $validator->setAttributeNames(trans('mconsole::sliders.form'));
        
        return $validator;
    }
}
