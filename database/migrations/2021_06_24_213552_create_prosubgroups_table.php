<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProsubgroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prosubgroups', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('pgid');
            $table->string('name');
            $table->string('code')->nullable();
            $table->string('description')->nullable();
            $table->string('brid')->nullable();
            $table->string('uid')->nullable();
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
        Schema::dropIfExists('prosubgroups');
    }
}
