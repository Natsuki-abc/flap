<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DeckRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        if ($this->isMethod('post')) {
            // store用
            return [
                'name' => 'required|string|max:255',
                'description' => 'nullable|string|max:1000',
            ];
        } else if ($this->isMethod('put') || $this->isMethod('patch')) {
            // update用
            return [
                'name' => 'sometimes|string|max:255',
                'description' => 'nullable|string|max:1000',
            ];
        }
        return [];
    }
}
