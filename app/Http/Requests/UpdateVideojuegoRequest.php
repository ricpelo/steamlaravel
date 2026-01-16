<?php

namespace App\Http\Requests;

use App\Models\Videojuego;
use Illuminate\Foundation\Http\FormRequest;

class UpdateVideojuegoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return $this->user()->can('update', $this->videojuego);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return Videojuego::rules();
    }
}
