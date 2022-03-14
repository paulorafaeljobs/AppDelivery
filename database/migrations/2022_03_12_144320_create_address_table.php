<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('address', function (Blueprint $table) {
            $table->id();
            $table->integer('id_user')->nullable()->default(NULL);
            $table->text('unidade')->nullable()->default(NULL);
            $table->string('cel',15)->nullable()->default(NULL); 
            $table->integer('cep')->nullable()->default(NULL);
            $table->text('logradouro')->nullable()->default(NULL);
            $table->text('bairro')->nullable()->default(NULL);
            $table->text('localidade')->nullable()->default(NULL);
            $table->string('uf',2)->nullable()->default(NULL);    
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
        Schema::dropIfExists('address');
    }
};
