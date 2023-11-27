<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    use HasFactory;
    public $timestamps = true;
    protected $table = 'pegawais';
    protected $primaryKey = 'id_pegawai';
    protected $fillable = [
        'id_bagian',
        'nama_pegawai',
        'alamat',
        'jenis_kelamin',
        'no_wa',
        'tanggal_lahir',
    ];
    public function bagian()
    {
        return $this->hasOne(Bagian::class, 'id_bagian', 'id_bagian');
    }
    public function pengunjung()
    {
        return $this->belongsTo(PengajuanKebutuhan::class, 'id_pegawai');
    }
}
