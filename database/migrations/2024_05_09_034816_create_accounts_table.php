<?php

use App\Models\Role;
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
        Schema::create('accounts', function (Blueprint $table) {
            $table->id();
            $table->string('username')->nullable();//
            $table->string('email');//
            $table->string('password')->default('$2y$10$ZzzB5eJRfmhMTw59wy8PSu1/34UiCNgLJe/a1zrx8RHNpcyXONC4G');//
            $table->string('name');//
            $table->string('linkfb')->nullable();//
            $table->string('numberphone')->nullable(); //
            $table->string('avatar');//
            $table->integer('numcomments')->default(3);//
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
        Schema::dropIfExists('accounts');
    }
};
