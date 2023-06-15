<?php

namespace App\Http\Requests\Admin\Menuitem;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class MenuUpdateRequest
 */
class MenuItemUpdateRequest extends FormRequest
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
            'title' => 'required|string|min:3|max:100',
            'menu_id' => 'exists:menus,id',
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
            'menu_id' => 'Меню',
            'created_at' => 'Создано',
            'updated_at' => 'Обновлено',
            'published_at' => 'Опубликовано',
        ];
    }
}
