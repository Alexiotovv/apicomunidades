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
        Schema::create('pueblos_indigenas', function (Blueprint $table) {
            $table->id(); 
            $table->string('cuenca_rio', 250)->default('');
            $table->string('directiva', 250)->default('');
            $table->string('federacion', 250)->default('');
            $table->string('predios', 250)->default('');
            $table->string('poblacion', 250)->default('');
            $table->string('colegio', 250)->default('');
            $table->string('postas_medicas', 250)->default('');
            $table->string('energia_electrica', 250)->default('');
            $table->string('agua_potable', 250)->default('');
            $table->string('local_comunal', 250)->default('');
            $table->string('proyecto_nucleo_ejecutor', 250)->default('');
            $table->string('iglesias', 250)->default('');
            
            $table->bigInteger('id_ubigeo')->unsigned();
            $table->foreign('id_ubigeo')->references('id')->on('ubigeos');
            
            $table->bigInteger('id_condicion_geografica')->unsigned();
            $table->foreign('id_condicion_geografica')->references('id')->on('condicion_geograficas');
            
            $table->bigInteger('id_actividad_economica')->unsigned();
            $table->foreign('id_actividad_economica')->references('id')->on('actividad_economicas');
            
            $table->bigInteger('id_nivel_educativo')->unsigned();
            $table->foreign('id_nivel_educativo')->references('id')->on('nivel_educativos');

            $table->bigInteger('id_religion')->unsigned();
            $table->foreign('id_religion')->references('id')->on('religiones');

            $table->bigInteger('id_lengua_originaria')->unsigned();
            $table->foreign('id_lengua_originaria')->references('id')->on('lenguas_originarias');
            
            $table->bigInteger('id_comunidad')->unsigned();
            $table->foreign('id_comunidad')->references('id')->on('comunidades');
            
            $table->bigInteger('id_autoridades')->unsigned();
            $table->foreign('id_autoridades')->references('id')->on('autoridades');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pueblos_indigenas');
    }
};
