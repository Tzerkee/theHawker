<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateColumnUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('username')->nullable()->after('name');
            $table->string('bio')->nullable()->after('remember_token');
            $table->date('birthday')->nullable()->after('bio');
            $table->string('country')->nullable()->after('address');
            $table->string('facebook')->nullable()->after('birthday');
            $table->string('instagram')->nullable()->after('facebook');
            $table->string('twitter')->nullable()->after('instagram');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('username');
            $table->dropColumn('bio');
            $table->dropColumn('birthday');
            $table->dropColumn('country');
            $table->dropColumn('faceook');
            $table->dropColumn('instagram');
            $table->dropColumn('twitter');
        });
    }
}
