<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBillsTable extends Migration
{
    public function up()
    {
        Schema::create('bills', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->double('value');
            $table->date('due_date');
            $table->integer('repeatFor')->nullable()->default(null);
            $table->integer('repeatedFor')->nullable()->default(null);
            $table->boolean('paid')->default(false);
            $table->integer('categories_id')->unsigned();
            $table->foreign('categories_id')->references('id')->on('categories');
        });
    }

    public function down()
    {
        Schema::dropIfExists('bills');
    }
}
