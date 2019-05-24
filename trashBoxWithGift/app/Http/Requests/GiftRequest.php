<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Collective\Html\FormFacade;

class GiftRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'id' => 'required',
            'name' => 'required',
            'price' => 'required',
            // 'imagePath' => 'required',
            'description' => 'required',
            'count' => 'required'
        ];
    }
}
