<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Telepon;

class Siswa extends Model
{
    //
    protected $table = 'siswa'; // nama table
    protected $fillable = [
        'nisn',
        'nama', 
        'nama_akhir',
        'tempat_lahir',
        'tanggal_lahir',
        'jenis_kelamin',
        'id_kelas',
        'created_at',
        'updated_at'
    ];

    public function getNamaAttribute($nama){
        return ucwords($nama);
    }

    public function setNamaAttribute($nama){
        $this->attributes['nama'] = strtolower($nama);
    }

    protected $dates = ['tanggal_lahir', 'created_at'];

    public function telepon(){
        return $this->hasOne('App\Telepon', 'id_siswa');
    }

    public function kelas(){
        return $this->belongsTo('App\Kelas', 'id_kelas');
    }

    public function hobi(){
        return $this->belongsToMany('App\Hobi', 'hobi_siswa', 'id_siswa', 'id_hobi')->withTimeStamps();
    }
}
