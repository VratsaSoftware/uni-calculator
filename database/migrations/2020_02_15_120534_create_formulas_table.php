<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormulasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('formulas', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('exam_type_id')->nullable();
            $table->foreign('exam_type_id')->references('id')->on('exam_types');

            $table->unsignedBigInteger('subject_id')->nullable();
            $table->foreign('subject_id')->references('id')->on('subjects');

            $table->decimal('coefficient')->nullable();
            $table->decimal('grade')->nullable();

            $table->unsignedBigInteger('admission_option_id')->nullable();
            $table->foreign('admission_option_id')->references('id')->on('admission_options');

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
        Schema::dropIfExists('formulas');
    }
}
