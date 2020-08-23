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
                'Instagram', 'Facebook', 'Whatsapp', 'Twitter', 'Linkedin', 'Bitbucket',
                'Gmail', 'Snapchat', 'Pinterest', 'Line', 'Telegram', 'Medium', 'Path'
            ]);
            $table->string('url');
            $table->string('slug');
            $table->unsignedInteger('user_id');
            $table->timestamp('created_at');
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
