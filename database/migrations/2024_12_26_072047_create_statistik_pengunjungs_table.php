<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
{
    Schema::create('statistik_pengunjungs', function (Blueprint $table) {
        $table->id('id_statistik'); // Primary key
        $table->date('tanggal'); // Tanggal statistik
        $table->integer('jumlah_pengunjung'); // Jumlah pengunjung
        $table->timestamps(); // created_at dan updated_at
    });
}

public function down()
{
    Schema::dropIfExists('statistik_pengunjungs');
}

};
