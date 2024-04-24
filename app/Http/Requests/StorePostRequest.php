<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
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
            'Nome'=>'required|max:100',
            //ho aggiunto questa parte type_id dopo avere creato la colonna 
            //il pezzo "|exists:types,id" ci fa controllare se l'id che manderemo nei nostri selects nelle viste esistono 
            //nella colonna "type_id'"
            'type_id'=>'nullable|exists:types,id',
            'Descrizione' => 'required',
            'Immagine_di_copertina' =>'nullable',
            'Tecnologie_utilizzate' =>'nullable',
            'Link_repo_GitHub' => 'nullable'     
        ];
    }

//traduzione degli errori in italiano
public function messages(): array {
    return [
        'Nome.required' => 'Il nome deve essere inserito',
        'Nome.max' => 'Il titolo deve avere massimo :max caratteri',
        'Descrizione.required' => 'La descrizione deve essere inserita',   
    ];
}



}
