<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class MenuUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
//        return auth()->check();
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
            'title' => 'required|max:100',
            'position' => 'required|exists:menus,position',
            'description' => 'max:100',
            /**
             * TODO исправить этот костыль
             */
            'parent_id' => $this->get('parent_id') !== "null" ? 'exists:menus,id' : 'nullable',
            'created_at' => 'nullable|date|dateVal',
            'updated_at' => 'nullable|date',
            'published_at' => 'nullable|date',
        ];
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'title' => 'Название',
            'position' => 'Позиция',
            'description' => 'Описание',
            'parent_id' => 'Родитель',
            'created_at' => 'Создано',
            'updated_at' => 'Обновлено',
            'published_at' => 'Опубликовано',
        ];
    }
}
