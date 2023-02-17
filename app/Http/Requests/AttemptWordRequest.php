<?php

namespace App\Http\Requests;

use App\Services\State;
use Illuminate\Foundation\Http\FormRequest;

class AttemptWordRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules(State $state)
    {
        return [
            'word' => [
                "required",
                "starts_with:$state->lastLetter",
                "unique:words,word"
            ],
        ];
    }

    public function messages()
    {
        return [
          'word.required' => 'Вы не ввели слово',
          'word.starts_with' => 'Слово должно начинаться на :values',
            'word.unique' => 'Такое слово уже было'
        ];
    }
}
