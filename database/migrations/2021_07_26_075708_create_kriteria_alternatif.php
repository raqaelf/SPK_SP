<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKriteriaAlternatif extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('kriteria_alternatif_tabel');
        Schema::dropIfExists('table_kriteria_alternatif');
        Schema::create('kriteria_alternatif', function (Blueprint $table) {
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
        Schema::dropIfExists('kriteria_alternatif');
    }
}
