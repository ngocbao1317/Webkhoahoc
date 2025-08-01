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
        Schema::create('chi_tiet_khoa_hocs', function (Blueprint $table) {
            $table->id();
            $table->integer('id_khach_hang');
            $table->integer('id_khoa_hoc');
            $table->integer('so_tien_mua');
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {

    Schema::dropIfExists('bai_viets');
    }
};
