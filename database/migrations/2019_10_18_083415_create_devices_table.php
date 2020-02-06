<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDevicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('devices', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('imei')->nullable();
            $table->string('phone')->nullable();
            $table->integer('puk_1')->nullable();
            $table->integer('puk_2')->nullable();
            $table->integer('pin_1')->nullable();
            $table->integer('pin_2')->nullable();
            $table->string('color')->nullable();
            $table->string('sentry_id')->nullable();
            $table->string('supplier')->nullable();
            $table->string('portal_pass')->nullable();
            $table->boolean('status')->default(false);
            $table->date('date_to_renewal')->nullable();
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
        Schema::dropIfExists('devices');
    }
}
