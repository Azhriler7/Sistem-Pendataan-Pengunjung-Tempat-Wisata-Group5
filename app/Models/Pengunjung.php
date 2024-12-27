<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Event extends Model{
    use HasFactory;
}
class Pengunjung extends Model
{
    use HasFactory;
    
    protected $table = 'pengunjung';

    protected $fillable = [
        'nama', 
        'usia', 
        'asal', 
        'kewarganegaraan', 
        'tanggal_berkunjung'
    ];

    protected $dates = ['tanggal_berkunjung'];

    protected $casts = [
        'usia' => 'integer',
    ];

    public function event()
    {
        return $this->belongsTo(Event::class);
    }

    public function getTanggalBerkunjungAttribute($value)
    {
        return $value->format('d F Y'); // Mengubah format tanggal menjadi "tanggal Bulan Tahun"
    }
}
