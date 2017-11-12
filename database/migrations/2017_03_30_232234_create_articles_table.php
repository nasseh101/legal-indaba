<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('admin_id');
            $table->integer('column_id');
            $table->integer('issue_id');
            $table->integer('yumpu_id')->nullable();
            $table->string('writer_name')->nullable();
            $table->string('article_title');
            $table->text('article_desc')->nullable();
            $table->text('article_text')->nullable();
            $table->text('writer_info')->nullable();
            $table->boolean('has_image');
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
        Schema::dropIfExists('articles');
    }
}
