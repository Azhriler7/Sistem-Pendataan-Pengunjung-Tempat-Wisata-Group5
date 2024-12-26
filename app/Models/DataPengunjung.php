<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataPengunjung extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_pengunjung',
        'umur',
        'asal',
        'tgl_lahir',
        'jk',
        'kewarganegaraan',
        'tgl_kunjungan',
    ];
}
