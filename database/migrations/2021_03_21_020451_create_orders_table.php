<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('order_number');
            $table->unsignedBigInteger('user_id');
            $table->enum('status', ['pending','processing','completed','cancelled'])->default('pending');
            $table->decimal('total', 10, 2);
            $table->integer('item_count');
            $table->boolean('is_paid')->default(false);
            $table->boolean('publish')->default(true);
            $table->enum('payment_method', ['cod','bank_transfer','card'])->default('cod');

            $table->string('shipping_fullname');
            $table->string('shipping_address1');
            $table->string('shipping_address2');
            $table->string('shipping_postcode');
            $table->string('shipping_city');
            $table->string('shipping_state');
            $table->string('shipping_country');
            $table->string('shipping_phone');
            $table->string('remarks')->nullable();

            $table->string('billing_fullname');
            $table->string('billing_address1');
            $table->string('billing_address2');
            $table->string('billing_postcode');
            $table->string('billing_city');
            $table->string('billing_state');
            $table->string('billing_country');
            $table->string('billing_phone');


            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade'); //->onUpdate('cascade')
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
        Schema::dropIfExists('orders');
    }
}
