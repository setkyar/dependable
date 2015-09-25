<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Developer extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create("developer", function (Blueprint $table) {
            $table->increments("id");
            $table->string("github_id");
            $table->string("github_name");
            $table->string("github_nickname");
            $table->string("github_email");
            $table->string("github_avatar");
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
        Schema::dropIfExists("developer");
    }
}
