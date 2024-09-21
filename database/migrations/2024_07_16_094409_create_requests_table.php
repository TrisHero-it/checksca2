<?php

use App\Models\Account;
use App\Models\Trader;
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
        Schema::create('requests', function (Blueprint $table) {
            $table->id();
            $table->string('zalo')->nullable();
            $table->string('facebook')->nullable();
            $table->string('website')->nullable();
            $table->string('describe')->nullable();
            $table->string('img')->nullable();
            $table->string('fullname')->nullable();
            $table->string('bank')->nullable();
            $table->string('fee')->nullable();
            $table->foreignIdFor(Trader::class)->constrained()->cascadeOnDelete();
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
        Schema::dropIfExists('requests');
    }
};
