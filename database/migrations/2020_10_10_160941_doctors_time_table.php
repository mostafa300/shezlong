<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DoctorsTimeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctors_time_table', function (Blueprint $table) {
            
            $table->unsignedInteger('doctors_id');
            $table->foreign('doctors_id')->references('id')->on('doctors')->onDelete('cascade');

            
            $table->unsignedInteger('time_table_id');
            $table->foreign('time_table_id')->references('id')->on('time_table')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
