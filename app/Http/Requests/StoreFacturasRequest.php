<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreFacturasRequest extends FormRequest
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

            'NumeroDeFactura' => 'required|string|max:50|unique:facturas,NumeroDeFactura',
            'user_id' => 'required|exists:users,id',
            'FechaDeCarga' => 'required',
            'ProductoPeq'  =>'required|numeric', 
            'ProductoMed'  =>'required|numeric',
            'ProductoGra'  =>'required|numeric',
            'PuntosDeFactura'=>'required|numeric'   
        ];
    }
}
