<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->string('title');//企業名
            $table->date('date');//日付
            $table->text('content');//内容
            $table->text('body')->default('感想');
            $table->char('evaluation')->default('B');
            $table->text('explanation')->default('企業説明');
            $table->char('selection')->default('S1');
            $table->char('period')->default('P1');
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
