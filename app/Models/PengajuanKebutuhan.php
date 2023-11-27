<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengajuanKebutuhan extends Model
{
    use HasFactory;
    protected $table = 'pengajuan_kebutuhans';
    protected $primaryKey = 'id_pengajuan';
    protected $fillable = [
        'id_pegawai',
        'id_kebutuhan',
        'id_katagori',
        'id_progres',
        'id_pic',
        'tanggal_pengajuan',
    ];

    public function pegawai()
    {
        return $this->hasOne(Pegawai::class, 'id_pegawai', 'id_pegawai');
    }
    public function kebutuhan()
    {
        return $this->hasOne(Kebutuhan::class, 'id_kebutuhan', 'id_kebutuhan');
    }
    public function katagori()
    {
        return $this->hasOne(Katagori::class, 'id_katagori', 'id_katagori');
    }
    public function progres()
    {
        return $this->hasOne(Progres::class, 'id_progres', 'id_progres');
    }
    public function pic()
    {
        return $this->hasOne(PenanggungJawab::class, 'id_pic', 'id_pic');
    }
}
