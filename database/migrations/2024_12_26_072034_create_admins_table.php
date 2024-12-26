<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('admins', function (Blueprint $table) {
        $table->id('id_admin'); // Primary key
        $table->string('username', 25); // Username (max 25 karakter)
        $table->string('password'); // Password (hashed)
        $table->string('nama_lengkap', 40); // Nama lengkap admin
        $table->timestamps(); // Menyediakan kolom created_at dan updated_at
    });
}

public function down()
{
    Schema::dropIfExists('admins');
}
};