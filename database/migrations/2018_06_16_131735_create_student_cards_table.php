<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentCardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_cards', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nim',15)->unique();
            $table->string('name');
            $table->unsignedInteger('prodi_id');
            $table->string('place_of_birth');
            $table->date('date_of_birth');
            $table->string('address');
            $table->string('city');
            $table->string('phone', 50)->nullable();
            $table->string('etc')->nullable();
            $table->string('photo_image')->nullable();
            $table->string('photo_number')->nullable();
            $table->enum('card_status',['1','0']);
            $table->enum('print_status', ['1','0']);
            $table->enum('taken_status', ['1','0']);
            $table->unsignedInteger('admin_id')->nullable();
            $table->timestamp('taken_at')->nullable();
            $table->unsignedInteger('admin_taken_id')->nullable();
            $table->timestamps();

            $table->foreign('prodi_id')->references('id')->on('prodis')->onDelete('CASCADE');
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
        Schema::dropIfExists('student_cards');
    }
}
