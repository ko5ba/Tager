<?php

namespace App\Http\Requests\Task;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'user_id' => 'required|integer|exists:users,id',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string|max:500',
            'priority' => 'nullable|string|in:Низкий,Средний,Высокий',
            'date_deadline' => 'nullable|date',
            'time_deadline' => 'nullable|date_format:H:i',
            'status' => 'nullable|string|in:Ожидание,В процессе,Выполнена,Отменена',
            'category_id' => 'nullable|integer|exists:categories,id',
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'Введите название задачи',
            'title.max:255' => 'Максимальное количество символов 255',
            'description.max:500' => 'Максимальное количество символов 500',
            'priority.in' => 'Приоритет должен быть одним из: высокий, средний, низкий.',
            'date_deadline.date' => 'Дата должна быть в формате ГГГГ-ММ-ДД.',
            'time_deadline.date_format' => 'Время должно быть в формате ЧЧ:ММ.',
            'status.in' => 'Статус должен быть одним из: ожидание, в процессе, завершен, отменен.',
            'category_id:exists' => 'Такой категории не существует.'
        ];
    }
}
