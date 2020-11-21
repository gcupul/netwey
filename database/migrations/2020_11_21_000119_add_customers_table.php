<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->string('dni');
            $table->foreignId('id_reg')->unsigned()->nullable()->index();;
            $table->foreignId('id_com')->unsigned()->nullable()->index();;
            $table->string('email')->unique();
            $table->string('name');
            $table->string('last_name');
            $table->string('address');
            $table->timestamp('date_reg', 0);
            $table->enum('status', ['A', 'I', 'trash']);
            $table->primary(['dni', 'id_com','id_reg']);
            $table->foreign('id_reg')->references('id_reg')->on('regions');
            $table->foreign('id_com')->references('id_com')->on('communes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customers');
    }
}
