<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSkillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('my_skill', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name');
            $table->string('slug');
            //frontend-framework: bootstrap, vue js, jquery. backend-framework: laravel, adonis.
            //basic-stack: php, js, html, css. tools: git, webpack,
            $table->enum('category', ['frontend-framework', 'backend-framework', 'basic-stack', 'tools', 'preprocessor']);
            $table->year('start_from');
            $table->unsignedInteger('user_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('my_skill');
    }
}
