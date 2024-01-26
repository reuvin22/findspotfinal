<?php

namespace App\Http\Requests\API\v1\Rooms;

use Illuminate\Foundation\Http\FormRequest;

class RoomImagesRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'roomId' => 'required|integer',
            'roomImages' => 'nullable|string'
        ];
    }
}
