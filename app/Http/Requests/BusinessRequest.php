<?php

namespace App\Http\Requests;

use App\Models\Business;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class BusinessRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        // $business = Business::findOrFail($this->id);
        // dd($this->id);
        // $this->user()->can('update-business', Business::findOrFail($this->id))
        return true;
    }


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'city' => 'required',
            'category' => ['required'],
            'title' => ['required', 'string', 'max:255'],
            'phone' => ['required'],
            'description' => ['required'],
            'website' => ['required', 'url'],
            'address' => ['required', 'string', 'max:255'],
            'logo' => ['required', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
            'images.*' => ['required', 'mimes:jpeg,png,jpg,gif'],
        ];
    }
}
