<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('intro');
            $table->date('startdate');
            $table->date('duedate');
            $table->timestamps();
        });

        DB::table('projects')->insert([
            [
                'title' => 'School Management',
                'intro' => 'A project about school management system',
                'startdate' => '2022-03-24',
                'duedate' => '2022-05-22',
            ]
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('projects');
    }
}
