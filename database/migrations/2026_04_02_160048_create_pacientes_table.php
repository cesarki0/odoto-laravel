<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePacientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pacientes', function (Blueprint $table) {
            $table->id();

            $table->foreignId('cliente_id')->constrained('clientes')->onDelete('cascade');
            $table->foreignId('doctor_id')->nullable()->constrained('doctors')->onDelete('set null');
            
            $table->string('nombre');
            $table->string('apellido');
            $table->string('direccion')->nullable();
            $table->date('fecha_nacimiento')->nullable();
            $table->string('celular')->nullable();

            // Historial médico
            $table->boolean('tratamiento_medico')->default(false);
            $table->boolean('paciente_cardiaco')->default(false);
            $table->boolean('antecedentes_familiares')->default(false);
            $table->boolean('medicacion')->default(false);
            $table->boolean('hemorragia')->default(false);
            $table->boolean('intervencion_quirurgica')->default(false);
            $table->boolean('alergias')->default(false);
            $table->boolean('diabetes')->default(false);
            $table->boolean('intolerancias')->default(false);
            $table->boolean('gestante')->default(false);
            $table->enum('presion_arterial', ['alta','baja','normal'])->nullable();
            $table->text('habitos')->nullable();

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
        Schema::dropIfExists('pacientes');
    }
}
