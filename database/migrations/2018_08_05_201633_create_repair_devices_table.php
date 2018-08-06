<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRepairDevicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('repair_devices', function (Blueprint $table) {
            $table->increments('id');
            $table->string('company_name');
            $table->date('appearience_date');
            $table->date('call_date');
            $table->date('visit_date');
            $table->string('caller_name');
            $table->float('cost');
            $table->longText('comment');
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
        Schema::dropIfExists('repair_devices');
    }
}
