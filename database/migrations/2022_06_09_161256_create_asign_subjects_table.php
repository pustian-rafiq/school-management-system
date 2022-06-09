<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAsignSubjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asign_subjects', function (Blueprint $table) {
            $table->id();
            $table->string('class_id');
            $table->string('subject_id');
            $table->double('pass_mark');
            $table->double('full_mark');
            $table->double('subjective_mark');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('asign_subjects');
    }
}