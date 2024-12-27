<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengunjung extends Model
{
    use HasFactory;
    
    protected $table = 'data_pengunjung';

    protected $fillable = [
        'nama_pengunjung', 
        'umur', 
        'asal', 
        'tgl_lahir', 
        'jenis_kelamin', 
        'kewarganegaraan', 
        'tgl_kunjungan'
    ];

    protected $dates = ['tgl_kunjungan'];
}