<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kebutuhan extends Model
{
    use HasFactory;
    public $timestamps = true;
    protected $table = 'kebutuhans';
    protected $primaryKey = 'id_kebutuhan';
    protected $fillable = [
        'jenis_kebutuhan',
        'tentang',
        'deskripsi',
        'level',
        'image',
    ];
    public function pengunjung()
    {
        return $this->belongsTo(PengajuanKebutuhan::class, 'id_kebutuhan');
    }
}
