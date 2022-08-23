<?php

namespace App\Http\Requests\V1;

use Illuminate\Foundation\Http\FormRequest;

class StoreBookRequest extends FormRequest
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
    public function rules()
    {
        return [
            'title' => 'required|min:5',
            'amount' => 'required|min:1',
            'publishedYear' => ['required'],
        ];
    }

    protected function prepareForValidation() {
        $this->merge([
            'published_year' => $this->publishedYear
        ]);
    }
}
