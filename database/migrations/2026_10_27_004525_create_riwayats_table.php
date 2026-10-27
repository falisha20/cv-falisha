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
        Schema::create('riwayat', function (Blueprint $table) {
            $table->id();
            $table->foreignId('biodata_id')->constrained('Biodata_1062')->cascadeOnDelete();
            $table->enum('jenis', ['pendidikan', 'pekerjaan', 'magang']);
            $table->string('instansi');
            $table->string('lokasi')->nullable();
            $table->string('periode')->nullable();
            $table->text('deskripsi')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('riwayat');
    }
};
