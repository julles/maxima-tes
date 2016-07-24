<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class VehicleRequest extends Request
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
        $this->beforeSave();

        return [
            'vehicle_no'=>'required|max:8|unique:vehicles,vehicle_no,'.request()->segment(3),
            'description'=>'required',
        ];
    }

    public function beforeSave()
    {
        $inputs = $this->all();
        $inputs['user_id']=auth()->user()->id;
        $this->replace($inputs);
    }
}
