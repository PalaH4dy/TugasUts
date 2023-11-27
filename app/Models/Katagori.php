<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Katagori extends Model
{
    use HasFactory;
    public $timestamps = true;
    protected $table = 'katagoris';
    protected $primaryKey = 'id_katagori';
    protected $fillable = ['nama_katagori'];
    public function pengunjung()
    {
        return $this->belongsTo(PengajuanKebutuhan::class, 'id_katagori');
    }
}
