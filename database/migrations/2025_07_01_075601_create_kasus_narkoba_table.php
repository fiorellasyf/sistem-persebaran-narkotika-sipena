<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */

    public function up(): void
    {
        if (!Schema::hasTable('kasus_narkoba')) {
            Schema::create('kasus_narkoba', function (Blueprint $table) {
                $table->id();
                $table->foreignId('desa_id')->constrained('desas')->onDelete('cascade'); // sudah include kecamatan lewat desa
                $table->string('nama_pelaku')->nullable();
                $table->enum('jenis_kelamin', ['L', 'P']);
                $table->integer('usia');
                $table->foreignId('jenis_narkotika_id')->constrained('jenis_narkotika')->onDelete('cascade');
                $table->date('tanggal_kejadiannya');
                $table->text('keterangan')->nullable();
                $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kasus_narkoba');
    }
};
