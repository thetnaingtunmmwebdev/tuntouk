<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\Schema;

class CreateRepairsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('repairs', function (Blueprint $table) {
            $table->id();
            $table->integer('vehicle_id');
            $table->string('repair_complain');
            $table->string('repair_diagnostic');
            $table->string('repair_services');
            $table->string('repair_parts');
            $table->string('repair_remarks');
            $table->date('repair_received_date')->nullable();
            $table->date('repair_delivered_date')->nullable();
            $table->string('repair_technician_id');
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
        Schema::dropIfExists('repairs');
    }
}
