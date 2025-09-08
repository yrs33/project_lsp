<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriSurat extends Model
{
    use HasFactory;
    protected $table = 'kategori_surats';
    protected $fillable = [
        'nama_kategori',
        'keterangan'
    ];

    public function arsip()
    {
        return $this->hasMany(ArsipSurat::class, 'kategori_id');
    }
}
