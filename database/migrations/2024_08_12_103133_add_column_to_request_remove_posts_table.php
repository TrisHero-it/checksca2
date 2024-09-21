<?php

use App\Models\Account;
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
        Schema::table('request_remove_posts', function (Blueprint $table) {
            $table->foreignIdFor(\App\Models\Account::class)->constrained()->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('request_remove_posts', function (Blueprint $table) {
            $table->dropConstrainedForeignIdFor(Account::class);
        });
    }
};
