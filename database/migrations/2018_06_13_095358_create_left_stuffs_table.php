<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLeftStuffsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('left_stuffs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('stuff_name');
            $table->unsignedInteger('location_id');
            $table->string('who_posted')->nullable();
            $table->string('etc')->nullable();
            $table->unsignedInteger('admin_id');
            $table->enum('status', ['1','0']);
            $table->string('who_taken')->nullable();
            $table->unsignedInteger('admin_taken_id')->nullable();
            $table->timestamp('taken_at')->nullable();
            $table->timestamps();

            $table->foreign('location_id')->references('id')->on('locations')->onDelete('CASCADE');
            $table->foreign('admin_id')->references('id')->on('admins')->onDelete('CASCADE');
            $table->foreign('admin_taken_id')->references('id')->on('admins')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('left_stuffs');
    }
}
