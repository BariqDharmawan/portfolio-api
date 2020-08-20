<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSkillCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('skill_category', function (Blueprint $table) {
            $table->uuid('id')->primary();
            //frontend-framework: bootstrap, vue js, jquery. backend-framework: laravel, adonis.
            //basic-stack: php, js, html, css. tools: git, webpack,
            $table->string('category');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('skill_category');
    }
}
