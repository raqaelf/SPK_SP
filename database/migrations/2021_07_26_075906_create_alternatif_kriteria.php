<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlternatifKriteria extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('kriteria_alternatif');
        Schema::create('alternatif_kriteria', function (Blueprint $table) {
            $table->integer('bobot');
            $table->foreignId('kriteria_id')->constrained()->onDelete('cascade');
            $table->foreignId('alternatif_id')->constrained()->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('alternatif_kriteria');
    }
}
