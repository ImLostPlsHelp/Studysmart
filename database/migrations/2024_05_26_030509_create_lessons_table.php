<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLessonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lessons', function (Blueprint $table) {
            $table->increments('id'); // Membuat kolom 'id' sebagai primary key dengan auto increment
            $table->unsignedInteger('course_id'); // Membuat kolom 'course_id' dengan tipe integer unsigned
            $table->text('questions'); // Membuat kolom 'questions' dengan tipe text
            $table->text('answers'); // Membuat kolom 'answers' dengan tipe text
            // Menambahkan foreign key constraint
            $table->foreign('course_id')->references('id')->on('courses')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lessons');
    }
}