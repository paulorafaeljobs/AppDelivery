<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePedidosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pedidos', function (Blueprint $table) {
            $table->id();
            $table->integer('id_user')->nullable()->default(NULL);
            $table->string('name_user', 50)->nullable()->default(NULL);
            $table->string('email_user', 50)->nullable()->default(NULL);
            $table->decimal('valor_pedido', 10,2)->nullable()->default(NULL);
            $table->string('status_pedido', 20)->nullable()->default(NULL);
            $table->string('payment', 20)->nullable()->default(NULL);
            $table->string('driver', 50)->nullable()->default(NULL);
            $table->text('address')->nullable()->default(NULL);
            $table->integer('id_deliveryman')->nullable()->default(NULL);
            $table->string('name_deliveryman', 50)->nullable()->default(NULL);
            $table->string('board', 20)->nullable()->default(NULL);
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
        Schema::dropIfExists('pedidos');
    }
}
