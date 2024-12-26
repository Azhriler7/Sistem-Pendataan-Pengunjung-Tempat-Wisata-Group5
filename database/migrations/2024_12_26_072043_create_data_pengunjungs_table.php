<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
{
    Schema::create('data_pengunjungs', function (Blueprint $table) {
        $table->id('id_pengunjung'); // Primary key
        $table->string('nama_pengunjung', 30); // Nama pengunjung
        $table->integer('umur'); // Umur
        $table->string('asal', 20); // Asal
        $table->date('tgl_lahir'); // Tanggal lahir
        $table->enum('jk', ['Laki-Laki', 'Perempuan']); // Jenis kelamin
        $table->enum('kewarganegaraan', ['WNI', 'WNA']); // Kewarganegaraan
        $table->timestamp('tgl_kunjungan')->useCurrent(); // Tanggal kunjungan
        $table->timestamps(); // created_at dan updated_at
    });
}

public function down()
{
    Schema::dropIfExists('data_pengunjungs');
}

};
