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
        Schema::create('surat', function (Blueprint $table) {
            $table->id('id_surat');
            $table->unsignedBigInteger('id_user');
            $table->unsignedBigInteger('id_jenis_surat');
            $table->date('tanggal_surat')->nullable(false)->default('2023-01-01');
            $table->text('ringkasan');
            $table->text('foto');

            //foreign
            $table->foreign('id_jenis_surat')->references('id_jenis_surat')->on('jenis_surat')
                ->cascadeOnDelete()->cascadeOnUpdate();

            $table->foreign('id_user')->references('id_user')->on('tbl_user')
                ->cascadeOnDelete()->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('surats');
    }
};
