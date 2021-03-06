<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIncomeModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('incomes', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->double('value');
            $table->date('date');
            $table->string('description')->nullable()->default(null);
            $table->boolean('paid')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('incomes');
    }
}
