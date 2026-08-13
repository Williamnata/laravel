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
       
    Schema::create('imc', function(Blueprint $table){
        $table->id();
        $table->string('nome');
        $table->double('peso');
        $table->double('altura');
        $table->string('url')->nullable();
        
        $table->timestamps();

        $table->bigInteger('idFaixa')->unsigned();

        $table->foreign('idFaixa')
        ->references('idFaixa')
        ->on('faixas')
        ->onDelete('cascade');
    });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
