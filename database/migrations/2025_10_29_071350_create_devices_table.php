<?php

use App\Models\Brand;
use App\Models\Customer;
use App\Models\DeviceName;
use App\Models\Type;
use App\Models\User;
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
            $table->foreignIdFor(DeviceName::class);
            $table->string('device_number')->unique();
            $table->foreignIdFor(Brand::class)->nullable();
            $table->foreignIdFor(Type::class)->nullable();
            $table->string('serial_number')->nullable();
            $table->string('location')->nullable();
            $table->year('procurement_year')->nullable();
            $table->foreignIdFor(User::class, 'pic_id')->nullable(); // Points to User
            $table->foreignIdFor(Customer::class)->nullable(); // Points to Customer
            $table->date('calibrated_date')->nullable();
            $table->date('next_calibration_date')->nullable();
            $table->string('cert_number')->nullable();
            $table->string('barcode')->nullable();
            $table->string('result')->nullable(); // Calibration result
            $table->enum('status', ['Available', 'Unavailable'])->default('Available'); // Device status
            $table->text('notes')->nullable();
            $table->foreignIdFor(User::class, 'admin_id')->nullable(); // Points to User who created the device
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
