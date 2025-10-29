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
        Schema::create('logbooks', function (Blueprint $table) {
            $table->id();
            $table->string('log_number')->unique();
            $table->date('date');
            $table->unsignedBigInteger('inventory_id');
            $table->text('accessories')->nullable();
            $table->date('start_date');
            $table->date('end_date');
            $table->string('location');
            $table->string('pic');
            $table->string('status')->default('active');
            $table->timestamps();
            
            $table->foreign('inventory_id')->references('id')->on('inventories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('logbooks');
    }
};
