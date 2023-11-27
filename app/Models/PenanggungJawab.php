<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenanggungJawab extends Model
{
    use HasFactory;
    public $timestamps = true;
    protected $table = 'penanggung_jawabs';
    protected $primaryKey = 'id_pic';
    protected $fillable = [
        'nama_pic',
        'alamat',
        'jenis_kelamin',
        'no_wa',
        'tanggal_lahir',
    ];
    public function pengunjung()
    {
        return $this->belongsTo(PengajuanKebutuhan::class, 'id_pic');
    }
}
