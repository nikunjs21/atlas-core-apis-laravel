<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateTaskRequest extends FormRequest
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
        // id, workspace_id, created_by, title, description, assignee, status, created_at, updated_at
        return [
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'assignee' => 'nullable|integer',
            'status' => 'nullable|string|in:todo,in_progress,done',
        ];
    }
}
