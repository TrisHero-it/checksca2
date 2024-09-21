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
        Schema::table('traders', function (Blueprint $table) {
        $table->dropColumn('active');

        $table->boolean('is_Admin_Facebook')->default(false);
        $table->boolean('identity_verification')->default(false);
        $table->boolean('phone_verification')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('traders', function (Blueprint $table) {
            $table->string('active');

            $table->dropColumn('is_Admin_Facebook');
            $table->dropColumn('identity_verification');
            $table->dropColumn('phone_verification');
        });
    }
};
