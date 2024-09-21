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
        Schema::table('posts', function (Blueprint $table) {
            $table->dropColumn('uid');
            $table->string('fullname')->nullable()->change();
            $table->string('numberbank')->nullable()->change();
            $table->string('namebank')->nullable()->change();
            $table->dropColumn('status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->string('uid');
            $table->string('status');
            $table->string('fullname')->nullable(false)->change();
            $table->string('numberbank')->nullable(false)->change();
            $table->string('namebank')->nullable(false)->change();
        });
    }
};
