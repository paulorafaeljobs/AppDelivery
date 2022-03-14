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
        Schema::create('productscars', function (Blueprint $table) {
            $table->id();
            $table->integer('id_pedido')->nullable()->default(NULL);            
            $table->integer('id_product')->nullable()->default(NULL);
            $table->string('name_user', 100)->nullable()->default(NULL);
            $table->string('email_user', 50)->nullable()->default(NULL);
            $table->text('img_product')->nullable()->default(NULL);
            $table->string('name_product', 50)->nullable()->default(NULL);
            $table->decimal('valor_product', 10,2)->nullable()->default(NULL);
            $table->integer('quant')->nullable()->default(NULL);   
            $table->string('metrica', 15)->nullable()->default(NULL);
            $table->string('time', 10)->nullable()->default(NULL);      
            $table->string('date', 15)->nullable()->default(NULL);
            $table->integer('day')->nullable()->default(NULL);
            $table->integer('month')->nullable()->default(NULL);
            $table->integer('qt')->nullable()->default(NULL);
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
        Schema::dropIfExists('productscars');
    }
};
