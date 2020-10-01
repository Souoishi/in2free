<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOutlinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('outlines', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            /* on practice page get id of topic and push it into*/
            $table->integer('dbtopic_id');
            $table->string('position');
            $table->text('thesis');
            $table->text('support1');
            $table->text('detail1');
            $table->text('support2');
            $table->text('detail2');
            $table->text('support3');
            $table->text('detail3');
            $table->timestamps();
            $table->index('user_id');
            /*the way to say to the Laravel Migration to add indices to that column, in order to get faster results when searching through that particular column.*/
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('outlines');
    }
}
