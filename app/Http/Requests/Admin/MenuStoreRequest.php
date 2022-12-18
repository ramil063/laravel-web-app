<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class MenuStoreRequest extends FormRequest
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
            'title' => 'required|string|min:3|max:100',
            'position' => 'required|string',
            'description' => 'nullable|string|min:3|max:100',
            /**
             * TODO исправить этот костыль
             */
            'parent_id' => $this->get('parent_id') !== null ? 'exists:menus,id' : 'nullable',
            'created_at' => 'nullable|date|dateVal',
            'updated_at' => 'nullable|date',
            'published_at' => 'nullable|date',
        ];
    }
}
