<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_number', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('service_name');
            $table->integer('number');
            $table->dateTime('issued_at');
            $table->dateTime('expired_at');
            $table->enum('source', ['kiosk', 'system']);
            $table->enum('status', ['pending', 'used', 'skipped']);
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
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
        Schema::dropIfExists('tbl_number');
    }
};
