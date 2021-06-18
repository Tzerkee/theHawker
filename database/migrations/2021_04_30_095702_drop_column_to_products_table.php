<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DropColumnToProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasColumn('products', 'offer_price'))
        {
            Schema::table('products', function (Blueprint $table)
            {
                $table->dropColumn('offer_price');
            });
        }

        if (Schema::hasColumn('products', 'discount'))
        {
            Schema::table('products', function (Blueprint $table)
            {
                $table->dropColumn('discount');
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->string('offer_price');
            $table->string('discount');
        });
    }
}
