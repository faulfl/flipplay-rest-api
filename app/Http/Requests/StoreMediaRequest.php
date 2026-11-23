<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreMediaRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $isPatch = $this->isMethod('PATCH');
        $mediaId = $this->route('medium')?->id ?? $this->route('medium');

        return [
            'title' => [
                $isPatch ? 'sometimes' : 'required',
                'string',
                'max:255',
                Rule::unique('media', 'title')->ignore($mediaId),
            ],
            'type'             => $isPatch ? 'sometimes|in:Film,Serial' : 'required|in:Film,Serial',
            'genre'            => $isPatch ? 'sometimes|string|max:100' : 'required|string|max:100',
            'release_year'     => $isPatch ? 'sometimes|integer|min:1900' : 'required|integer|min:1900',
            'duration_minutes' => 'nullable|integer|min:1',
            'total_episodes'   => 'nullable|integer|min:1',
        ];
    }

    public function messages(): array
    {
        return [
            'title.required'        => 'Judul media wajib diisi',
            'title.unique'          => 'Judul media sudah terdaftar dan tidak boleh duplikat',
            'type.required'         => 'Jenis media wajib diisi',
            'type.in'               => 'Jenis media harus berupa Film atau Serial',
            'genre.required'        => 'Genre media wajib diisi',
            'release_year.required' => 'Tahun rilis wajib diisi',
        ];
    }
}
