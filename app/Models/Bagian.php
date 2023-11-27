<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bagian extends Model
{
    use HasFactory;
    public $timestamps = true;
    protected $table = 'bagians';
    protected $primaryKey = 'id_bagian';
    protected $fillable = [
        'nama_bagian'
    ];
    public function pegawai()
    {
        return $this->hasMany(Pegawai::class, 'id_bagian');
    }
}
