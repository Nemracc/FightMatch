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
        Schema::create('emparejamiento', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('peleador1_id');
            $table->unsignedBigInteger('peleador2_id');
            $table->date('fecha');
            $table->string('resultado')->nullable();
            $table->timestamps();

            $table->foreign('peleador1_id')->references('id')->on('peleadores')->onDelete('cascade');
            $table->foreign('peleador2_id')->references('id')->on('peleadores')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('emparejamiento');
    }
};
