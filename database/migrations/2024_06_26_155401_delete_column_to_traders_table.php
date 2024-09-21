<?php

use App\Models\Category;
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
            $table->dropColumn('web');
            $table->dropColumn('price');
            $table->dropColumn('cate');
            $table->foreignIdFor(Category::class)->constrained()->onDelete('cascade');
            $table->string('number_bank')->default('0984484683');
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
            $table->string('web');
            $table->integer('price');
            $table->dropColumn('number_bank');
        });
    }
};
