<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLabelRequirementTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('label_requirement', function (Blueprint $table) {
            $table->unsignedBigInteger('requirement_id')->index();
            $table->foreign('requirement_id')->references('id')->on('requirements')->onDelete('cascade');
            $table->unsignedBigInteger('label_id')->index();
            $table->foreign('label_id')->references('id')->on('labels')->onDelete('cascade');
            $table->primary(['requirement_id', 'label_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('label_requirement');
    }
}
