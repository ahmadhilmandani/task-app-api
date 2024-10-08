<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTaskRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' =>  'required',
            'deadline' => 'required',
            'summary' => 'required',
            'is_done' => 'required'
        ];
    }
}
