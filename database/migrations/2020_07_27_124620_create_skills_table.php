<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            //frontend-framework: bootstrap, vuejs, jquery. backend-framework: laravel, adonis. 
            //basic-stack: php, js, html, css. tools: git, webpack,
            $table->enum('category', ['frontend-framework', 'backend-framework', 'basic-stack', 'tools', 'preprocessor']);
            $table->year('start_from');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('skills');
    }
}
