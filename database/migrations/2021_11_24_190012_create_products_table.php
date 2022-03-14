<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name_product', 50)->nullable()->default(NULL);
            $table->string('category_product', 15)->nullable()->default(NULL);
            $table->decimal('valor_product', 10,2)->nullable()->default(NULL);
            $table->text('descricao_product')->nullable()->default(NULL);
            $table->text('img_product1')->nullable()->default(NULL);
            $table->text('img_product2')->nullable()->default(NULL);
            $table->text('img_product3')->nullable()->default(NULL);
            $table->text('img_product4')->nullable()->default(NULL);
            $table->text('url_slug')->nullable()->default(NULL);
            $table->string('metrica', 15)->nullable()->default(NULL);
            $table->integer('status')->nullable()->default(NULL);
            $table->integer('quant')->nullable()->default(NULL);            
            $table->string('time', 10)->nullable()->default(NULL);      
            $table->string('date', 15)->nullable()->default(NULL);
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
        Schema::dropIfExists('products');
    }
}
