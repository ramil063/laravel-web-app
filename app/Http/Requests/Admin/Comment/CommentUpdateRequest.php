<?php

namespace App\Http\Requests\Admin\Comment;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class CommentUpdateRequest
 */
class CommentUpdateRequest extends FormRequest
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
            'text' => 'required|string|min:3|max:1000',
            'user_id' => 'required|int|exists:users,id',
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
            'text' => 'Название',
            'user_id' => 'Пользователь',
            'parent_id' => 'Родитель',
            'created_at' => 'Создано',
            'updated_at' => 'Обновлено',
            'published_at' => 'Опубликовано',
        ];
    }
}
