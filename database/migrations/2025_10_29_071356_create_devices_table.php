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
            $table->unsignedBigInteger('name_id');
            $table->string('inventory_number')->unique();
            $table->unsignedBigInteger('brand_id');
            $table->unsignedBigInteger('model_id');
            $table->string('serial_number')->nullable();
            $table->string('location')->nullable();
            $table->year('procurement_year')->nullable();
            $table->unsignedBigInteger('pic_id')->nullable(); // Points to User
            $table->unsignedBigInteger('customer_id')->nullable(); // Points to Customer
            $table->date('calibrated_date')->nullable();
            $table->date('next_calibration_date')->nullable();
            $table->string('cert_number')->nullable();
            $table->string('barcode')->nullable();
            $table->string('result')->nullable(); // Calibration result
            $table->string('status')->default('active'); // Device status
            $table->text('notes')->nullable();
            $table->unsignedBigInteger('user_id'); // Points to User who created the device
            $table->timestamps();
            
            $table->foreign('name_id')->references('id')->on('device_names')->onDelete('cascade');
            $table->foreign('brand_id')->references('id')->on('brands')->onDelete('cascade');
            $table->foreign('model_id')->references('id')->on('models')->onDelete('cascade');
            $table->foreign('pic_id')->references('id')->on('users')->onDelete('set null');
            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('set null');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
