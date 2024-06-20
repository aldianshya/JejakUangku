<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pengeluaran', function (Blueprint $table) {
            $table->id('id_pengeluaran'); // Primary key with auto increment
            $table->string('email', 20); // Foreign key from pengguna table
            $table->date('tanggal');
            $table->string('jenis_pengeluaran', 20);
            $table->decimal('jumlah_pengeluaran', 10, 3);
            $table->timestamps();
            $table->foreign('email')->references('email')->on('pengguna')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengeluaran');
    }
};
