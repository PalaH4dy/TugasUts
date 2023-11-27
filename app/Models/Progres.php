<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Progres extends Model
{
    use HasFactory;
    public $timestamps = true;
    protected $table = 'progres';
    protected $primaryKey = 'id_progres';
    protected $fillable = ['progres'];
    public function pengunjung()
    {
        return $this->belongsTo(PengajuanKebutuhan::class, 'id_progres');
    }
}
