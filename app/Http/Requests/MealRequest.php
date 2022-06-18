<?php
namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;

class MealRequest extends FormRequest{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|string|min:3|max:20',
            'description' => 'required|min:2|max:500',
            'small_meal_price' => 'required|numeric',
            'medium_meal_price' => 'required|numeric',
            'large_meal_price' => 'required|numeric',
            'category' => 'required',
            'image' => 'required|mimes:png,jpg,svg,jpeg',
        ];
    }
}
