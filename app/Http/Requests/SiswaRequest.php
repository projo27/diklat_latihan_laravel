<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class SiswaRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        //return false; // default adalah false
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        if ($this->method() == "PATCH") {
            $nisn_rules = 'required|string|size:4|max:4|unique:siswa,nisn,'.$this->get('id');
            $telepon_rules = 'sometimes|numeric|digits_between:10,15|unique:telepon,no_telepon,'.$this->get('id').',id_siswa';
        } else {    
            $nisn_rules = 'required|string|size:4|unique:siswa,nisn';
            $telepon_rules = 'sometimes|numeric|digits_between:10,15|unique:telepon,no_telepon';
        }
        
        return [
            'nisn' => $nisn_rules,
            'nama' => 'required|string|max:50',
            'tempat_lahir' => 'required|string',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:L,P',
            'no_telepon' => $telepon_rules,
            'id_kelas' => 'required'
        ];
    }
}
