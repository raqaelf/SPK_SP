<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKriteriaAlternatifTabel extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kriteria_alternatif_tabel', function (Blueprint $table) {
            $table->float('bobot');
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
        Schema::dropIfExists('kriteria_alternatif_tabel');
    }
}
