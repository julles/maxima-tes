<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class BookingVehicleRequest extends Request
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
            'origin'=>'required|max:255',
            'destination'=>'required|max:255',
        ];
    }

    public function beforeSave()
    {
        $inputs = $this->all();
        $inputs['user_id']=auth()->user()->id;
        $inputs['vehicle_id']=request()->segment(3);
        $inputs['status']='pending';
        $this->replace($inputs);
    }
}
