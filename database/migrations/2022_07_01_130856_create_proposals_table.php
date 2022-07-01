<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProposalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proposals', function (Blueprint $table) {
            $table->id();
            $table->string('user_id');
            $table->string('tender_name');
            $table->date('date')->useCurrent();
            $table->string('location');
            $table->date('dead_line');
            $table->integer('budget');
            $table->tinyInteger('status')->default(0)->comment("O is pending, 1 is approve, 2 is reject");
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
        Schema::dropIfExists('proposals');
    }
}