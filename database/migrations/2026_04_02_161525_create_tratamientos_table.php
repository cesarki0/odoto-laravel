<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTratamientosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tratamientos', function (Blueprint $table) {
            $table->id();

                $table->foreignId('paciente_id')->constrained('pacientes')->onDelete('cascade');
                $table->foreignId('doctor_id')->constrained('doctors')->onDelete('cascade');


                $table->string('descripcion');
                $table->string('pieza')->nullable(); // número de diente
                $table->decimal('costo', 8, 2)->default(0);
                 $table->string('estado')->default('activo');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tratamientos');
    }
}
