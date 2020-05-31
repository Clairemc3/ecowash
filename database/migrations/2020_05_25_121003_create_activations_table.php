<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActivationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('activations', function (Blueprint $table) {
            $table->id();
	        $table->bigInteger('user_id')->unsigned();
	        $table->string('token')->unique();
	        $table->dateTime('completed_at')->nullable();
            $table->timestamps();

	        $table->foreign('user_id')
		            ->references('id')
		            ->on('users')
		            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('activations');
    }
}
