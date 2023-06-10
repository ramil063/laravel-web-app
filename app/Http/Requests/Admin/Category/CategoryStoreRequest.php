<?php

namespace App\Http\Requests\Admin\Category;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class CategoryStoreRequest
 */
class CategoryStoreRequest extends FormRequest
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
            'code' => 'nullable|string',
            /**
             * TODO исправить этот костыль
             */
            'parent_id' => $this->get('parent_id') !== null ? 'exists:d_categories,id' : 'nullable',
            'created_at' => 'nullable|date|dateVal',
            'updated_at' => 'nullable|date',
        ];
    }
}
