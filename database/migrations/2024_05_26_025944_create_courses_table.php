<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->increments('id'); // Menentukan kolom 'id' sebagai primary key dengan tipe integer auto increment
            $table->string('name', 255); // Menentukan kolom 'name' dengan tipe varchar(255)
            $table->text('description'); // Menentukan kolom 'description' dengan tipe text
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('courses');
    }
}
