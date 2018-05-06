<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('series_id')->nullable();
            $table->string('slug')->unique();
            $table->string('title');
            $table->longtext('content');
            $table->text('description')->default('');
            $table->string('password')->nullable();
            $table->string('cover_image')->nullable();
            $table->enum('creation', ['original', 'translation'])->default('original');
            $table->enum('status', ['draft', 'publish', 'private', 'trash'])->default('draft');
            $table->enum('visibility', ['publish', 'private', 'password_protected'])->default('publish');
            $table->timestamp('published_at')->nullable();
            $table->unsignedInteger('views')->default(0);
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
        Schema::dropIfExists('posts');
    }
}
