<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CardRequest extends FormRequest
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
                'deck_id' => 'required|exists:decks,id',
                'front' => 'required|string|max:255',
                'back' => 'required|string|max:255',
            ];
        } else if ($this->isMethod('put') || $this->isMethod('patch')) {
            // update用
            return [
                'deck_id' => 'sometimes|exists:decks,id',
                'front' => 'sometimes|string|max:255',
                'back' => 'sometimes|string|max:255',
            ];
        }
        return [];
    }
}
