<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePagosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pagos', function (Blueprint $table) {
            $table->id();

                $table->foreignId('tratamiento_id')->constrained('tratamientos')->onDelete('cascade');
                
                $table->date('fecha');
                $table->decimal('total', 8, 2);
                $table->decimal('adelanto', 8, 2)->default(0);
                $table->decimal('saldo', 8, 2)->default(0);

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
        Schema::dropIfExists('pagos');
    }
}
