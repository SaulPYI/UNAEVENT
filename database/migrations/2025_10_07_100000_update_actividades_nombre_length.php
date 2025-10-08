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
        // Ajusta la longitud del campo `nombre` en la tabla `actividades` a 150.
        // Nota: esto utiliza ->change() y requiere doctrine/dbal en el proyecto.
        if (!Schema::hasTable('actividades')) {
            return;
        }

        Schema::table('actividades', function (Blueprint $table) {
            // Cambiamos a string(150)
            $table->string('nombre', 150)->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (!Schema::hasTable('actividades')) {
            return;
        }

        Schema::table('actividades', function (Blueprint $table) {
            // Revertimos a tipo TEXT (sin límite práctico). Ajusta si tu esquema previo era distinto.
            $table->text('nombre')->change();
        });
    }
};
