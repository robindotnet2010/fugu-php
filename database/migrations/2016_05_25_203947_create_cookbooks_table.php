<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCookbooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable('authors')) {
            Schema::create('cookbooks', function (Blueprint $table) {
                $table->increments('id');
                $table->string('name');
                $table->integer('author_id')->unsigned();
                $table->foreign('author_id')
                    ->references('id')->on('authors');
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cookbooks');
    }
}
