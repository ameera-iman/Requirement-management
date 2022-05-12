<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStatussTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('statuss', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('progress');
            $table->timestamps();
        });

        DB::table('statuss')->insert([
            [
                'name' => 'todo',
                'progress' => 'ToDo',
            ], [
                'name' => 'doing',
                'progress' => 'Doing',
            ],[
                'name' => 'done',
                'progress' => 'Done',
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
        Schema::dropIfExists('statuss');
    }
}
