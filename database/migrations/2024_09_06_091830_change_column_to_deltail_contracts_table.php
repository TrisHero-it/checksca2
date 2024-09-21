<?php

use App\Models\Trader;
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
        Schema::table('detail_contracts', function (Blueprint $table) {
            $table->dropColumn('role');
            $table->foreignIdFor(\App\Models\Trader::class)->constrained()->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('detail_contracts', function (Blueprint $table) {
            $table->string('role');
            $table->dropConstrainedForeignIdFor(Trader::class);
        });
    }
};
