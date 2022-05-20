<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProdutoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true; // in this case because is only CRUD project still without authenctication system
        //we want to ever accept the user interaction in pages
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        /*This is the rules of validation, putting below, 
        the post objet form name ('name propertie of each input from html')
        following of => and their rules
        */
        return [
            'inputProdName' => 'required|max:100',
            'inputProdDesc' =>'required|max:255',
            'inputProdQuant' => 'required|numeric',
            'inputProdVal' => 'required'
        ];
    }
}
