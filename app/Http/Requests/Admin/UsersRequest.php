<?php

namespace App\Http\Requests\Admin;

use App\Http\Requests\Request;
use App\Rules\AlphaName;
use Illuminate\Foundation\Http\FormRequest;

/**
 * Class UsersRequest
 * @package App\Http\Requests\Admin
 */
class UsersRequest extends Request
{

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255', new AlphaName],
            'email' => 'required|email|unique:users,email,' . $this->user->id,
            'password' => 'nullable|confirmed',
            'roles.*' => 'exists:roles,id'
        ];
    }
}
