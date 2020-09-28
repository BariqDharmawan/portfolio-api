<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contact', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->enum('name', [
                'instagram', 'facebook', 'whatsapp', 'twitter', 'linkedin', 'bitbucket',
                'email', 'snapchat', 'pinterest', 'line', 'telegram', 'medium', 'path'
            ]);
            $table->string('value');
            $table->string('slug');
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
        Schema::dropIfExists('contact');
    }
}
