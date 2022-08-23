<?php

namespace App\Http\Requests\V1;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBookRequest extends FormRequest
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
        $method = $this->method();

        if($method == 'PUT') {
            return [
                'title' => 'required|min:5',
                'amount' => 'required|min:1',
                'publishedYear' => ['required'],
            ];
        }else {
            return [
                'title' => 'sometimes','required|min:5',
                'amount' => 'sometimes','required|min:1',
                'publishedYear' => ['sometimes','required'],
            ];
        }        
    }

    protected function prepareForValidation() {
        if($this->published_year){
            $this->merge([
                'published_year' => $this->publishedYear
            ]);
        }        
    }
}
