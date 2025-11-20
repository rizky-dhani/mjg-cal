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
            $table->uuid('deviceId')->after('id')->unique();
            $table->foreignIdFor(DeviceName::class)->nullable()->constrained('device_names');
            $table->string('device_number')->nullable()->unique();
            $table->foreignIdFor(Brand::class)->nullable()->constrained('brands');
            $table->foreignIdFor(Type::class)->nullable()->constrained('types');
            $table->string('serial_number')->nullable();
            $table->string('location')->nullable();
            $table->year('procurement_year')->nullable();
            $table->foreignIdFor(User::class, 'pic_id')->nullable()->constrained('users'); // Points to User
            $table->foreignIdFor(Customer::class)->nullable()->constrained('customers'); // Points to Customer
            $table->date('calibration_date')->nullable();
            $table->date('next_calibration_date')->nullable();
            $table->string('cert_number')->nullable();
            $table->string('barcode')->nullable();
            $table->string('result')->nullable(); // Calibration result
            $table->enum('status', ['Available', 'Unavailable'])->default('Available'); // Device status
            $table->text('notes')->nullable();
            $table->foreignIdFor(User::class, 'admin_id')->nullable()->constrained('users'); // Points to User who created the device
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
