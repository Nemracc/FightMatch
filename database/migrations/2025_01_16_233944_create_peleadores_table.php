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
        Schema::create('peleadores', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->integer('edad');
            $table->decimal('peso', 5, 2);
            $table->integer('peleas');
            $table->string('academia');
            $table->decimal('academia_distancia', 5, 2)->nullable();
            $table->string('ci')->unique();
            $table->char('sexo', 1);
            $table->unsignedBigInteger('modalidad_id');
            $table->timestamps();

            // Foreign key to modalidad
            $table->foreign('modalidad_id')->references('id')->on('modalidad')->onDelete('cascade');
 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('peleadores');
    }
};
