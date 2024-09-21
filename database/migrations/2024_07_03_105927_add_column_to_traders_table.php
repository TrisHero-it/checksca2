<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('traders', function (Blueprint $table) {
            $table->dropColumn('number_bank');
            $table->string('facebook')->nullable();
            $table->string('website')->nullable();
            $table->string('identity');
            $table->string('fee')->nullable();
        });
    }

    public function down()
    {
        Schema::table('traders', function (Blueprint $table) {
            $table->string('number_bank');
            $table->dropColumn('facebook');
            $table->dropColumn('website');
            $table->dropColumn('identity');
            $table->dropColumn('fee');
        });
    }
};
