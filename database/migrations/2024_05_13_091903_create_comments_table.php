<?php

use App\Models\Account;
use App\Models\Comment;
use App\Models\Post;
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
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Account::class)->constrained()->onDelete('cascade');
            $table->foreignIdFor(Comment::class)->nullable()->constrained()->onDelete('cascade');
            $table->foreignIdFor(Post::class)->constrained()->onDelete('cascade');
            $table->string('comment_content'); 
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
        Schema::dropIfExists('comments');
    }
};
