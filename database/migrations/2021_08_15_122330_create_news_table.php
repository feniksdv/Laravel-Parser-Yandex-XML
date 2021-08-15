<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->constrained('categories')->cascadeOnDelete();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete(); //автор
            $table->string('title', 191);
            $table->text('content')->nullable();
            $table->string('image', 255)->nullable();
            $table->string('seo_title', 191)->nullable();
            $table->string('seo_description', 255)->nullable();
            $table->foreignId('status_id')->constrained('statuses')->cascadeOnDelete();
            $table->enum('status', ['active', 'delete'])->default('active');
            $table->softDeletes();
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
        Schema::dropIfExists('news');
    }
}
