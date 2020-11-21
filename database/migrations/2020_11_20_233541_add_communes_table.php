<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCommunesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('communes', function (Blueprint $table) {
            $table->bigInteger('id_com');
            $table->foreignId('id_reg');
            $table->string('description');
            $table->enum('status', ['A', 'I', 'trash']);
            $table->primary(['id_com','id_reg']);
            $table->foreign('id_reg')->references('id_reg')->on('regions');
        });
        
        Schema::table('communes', function (Blueprint $table) {
            $table->bigInteger('id_com', true, true)->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('communes');
    }
}
