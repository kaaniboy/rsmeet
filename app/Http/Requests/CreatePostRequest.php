<?php namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Response;

class CreatePostRequest extends FormRequest
{
    public function rules()
    {
        return [
            'title' => 'required|max: 125',
            'name' => 'required|max: 15',
            'description' => 'required|max:1250',
            'category' => 'required',
            'combat' => 'required',
            'age' => 'required'
            
        ];
    }

    public function authorize()
    {
        // Only allow logged in users
        // return \Auth::check();
        // Allows all users in
        return true;
    }
}