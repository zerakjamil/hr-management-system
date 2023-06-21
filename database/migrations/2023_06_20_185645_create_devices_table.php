<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('devices', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('branch_id');

            $table->foreign('branch_id')->references('id')
                ->on('branches')
                ->onDelete('cascade');


            $table->string('status');

            $table->string('box_number');
            $table->string('serial_number');
            $table->string('mac_address');

            $table->date('registered_date');
            $table->date('sold_date')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('devices');
    }
};
