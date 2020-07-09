<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlertsTableChangeStartAndEndToToDateTime extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('alerts', function (Blueprint $table) {
            $table->dateTime('start_date')->change();
            $table->dateTime('end_date')->change();
        });


        Schema::table('alerts', function (Blueprint $table) {
            $table->renameColumn('start_date', 'starts_at');
        });

        Schema::table('alerts', function (Blueprint $table) {
            $table->renameColumn('end_date', 'ends_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('alerts', function (Blueprint $table) {
            $table->renameColumn('starts_at', 'start_date');
            $table->renameColumn('ends_at', 'end_date');
        });

        Schema::table('alerts', function (Blueprint $table) {
            $table->date('start_date')->change();
        });

        Schema::table('alerts', function (Blueprint $table) {
            $table->date('end_date')->change();
        });
    }
}
