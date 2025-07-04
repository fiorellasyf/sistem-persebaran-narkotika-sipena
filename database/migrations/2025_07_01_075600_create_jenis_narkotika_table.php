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
        if (!Schema::hasTable('jenis_narkotika')) {
        Schema::create('jenis_narkotika', function (Blueprint $table) {
        $table->id();
        $table->string('nama_jenis');
        $table->string('golongan')->nullable();
        $table->text('keterangan')->nullable();
        $table->timestamps();
    });
}
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jenis_narkotika');
    }
};
