<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompletedCoursesTable extends Migration
{
    // public function up()
    // {
    //     Schema::create('completed_courses', function (Blueprint $table) {
    //         $table->id();
    //         $table->foreignId('user_id')->constrained()->onDelete('cascade');
    //         $table->foreignId('courses_id')->constrained()->onDelete('cascade');
    //         $table->timestamps();
    //     });
    // }

    public function down()
    {
        Schema::dropIfExists('completed_courses');
    }
}
